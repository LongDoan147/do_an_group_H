<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Image;
use App\Models\Categories;

class ProductController extends Controller
{
    //
    public function index()
    {
        $product = Products::where('trangthai', 1)->get();
        $danhmuc = Categories::where('trangthai', 1)->get();

        $banner = Image::where('trangthai', 1)
        ->where('loai', 'bannerProduct')
        ->first();
        $viewData = [
            'product' => $product,
            'danhmuc' => $danhmuc,
            'banner' => $banner
        ];
        return view('templates.clients.product.index', $viewData);
    }

    public function detail($slug, Request $request)
    {
        $meta = [];
        if ($slug) {
            $product = Products::where('slug', $slug)->first();
            $discount = 0;
            $product->giaban = ($product->giaban - $discount < 0) ? 0 : $product->giaban - $discount;

            if ($product) {
                $related = Products::where('id_loaisanpham', $product->id_loaisanpham)->get();
                $meta['title'] = $product->tensp;
                $meta['description'] = $product->tensp;
                $meta['url'] = $request->url();
                $meta['image'] = asset('uploads/product/' . $product->hinhanh);
            }
            $viewData = [
                'product' => $product,
                'related' => $related,
                'meta' => $meta,
            ];
        }
        return view('templates.clients.product.detail', $viewData);
    }
}
