<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
