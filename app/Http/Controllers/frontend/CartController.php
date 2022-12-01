<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Sizes;
use App\Models\Cart;

class CartController extends Controller
{
    public function index(Request $request)
    {
        if (Session('coupon')) {
            $request->session()->forget('coupon');
        }
        if (Session('feeship')) {
            $request->session()->forget('feeship');
        }
        return view('templates.clients.cart.index');
    }
    public function addCart(Request $request)
    {
        $product = Products::find((int)$request->id);
        $discount = 0;

        $product->giaban = ($product->giaban - $discount < 0) ? 0 : $product->giaban - $discount;
        $size = Sizes::find($request->size);
        if ($product != null) {
            $oldCart = Session('cart') ? Session('cart') : null;
            $newCart = new Cart($oldCart);
            $idCart = $request->id;
            if ($oldCart) {
                $idCart = $newCart->checkCartProduct($product->id, $request->size, $oldCart);
            }
            $newCart->addCart($product, $idCart, $request->sl, $size);
            $request->session()->put('cart', $newCart);
        }
        return view('templates.clients.home.cart');
    }
}
