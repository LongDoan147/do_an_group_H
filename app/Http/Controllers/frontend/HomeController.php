<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class HomeController extends Controller
{
    public function index()
    {


        $product = Products::where('trangthai', 1)->get();
        $danhmuc = Categories::where('trangthai', 1)->get();

        $viewData = [
            'product' => $product,
            'danhmuc' => $danhmuc,
        ];
        return view('templates.clients.home.index', $viewData);
    }

    public function quickView(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $product = Products::find($id);
            $discount = 0;
            if (count($product->Coupon) > 0) {
                if ($product->Coupon[0]->loaigiam === 1) {
                    $discount = $product->giaban *  $product->Coupon[0]->giamgia / 100;
                } else {
                    $discount = $product->Coupon[0]->giamgia;
                }
            }
            $product->giaban = ($product->giaban - $discount < 0) ? 0 : $product->giaban - $discount;

            return view('templates.clients.home.quickview', ['product' => $product]);
        }
    }
}
