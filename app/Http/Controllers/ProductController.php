<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function show()
    {
        $spham = Products::paginate(10);
        return view('admin_pages.products.index', compact('spham'));
    }
}
