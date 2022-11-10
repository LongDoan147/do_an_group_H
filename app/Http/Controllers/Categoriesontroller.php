<?php

namespace App\Http\Controllers;
use App\Models\Categories;

use Illuminate\Http\Request;

class Categoriesontroller extends Controller
{
    public function index()
    {
        $getCat = Categories::all();
        return view('admin_pages.category.index', compact('getCat'));
    }
}
