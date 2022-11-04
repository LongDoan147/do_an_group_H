<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\MenuPosts;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function index()
    {

        //danh sách bài viết
        $posts = Posts::where(['trangthai' => 1, 'loaibaiviet' => 'tin-tuc'])->get();

        //danh mục bài viết
        $cate = MenuPosts::where('trangthai', 1)->get();
        $viewData = [
            'posts' => $posts,
            'cate' => $cate
        ];
        return view('templates.clients.posts.index', $viewData);
    }
}
