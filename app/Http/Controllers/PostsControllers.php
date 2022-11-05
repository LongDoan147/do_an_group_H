<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestPost;
use Illuminate\Http\Request;
use App\Models\MenuPosts;
use Illuminate\Support\Str;

class PostsControllers extends Controller
{
    public function getTypePost()
    {
        $menupost = MenuPosts::all();
        return view('admin_pages.posts.getTypePost', ['menupost' => $menupost]);
    }

    public function createMenuPost()
    {
        return view('admin_pages.posts.createMenuPost');
    }

    public function saveMenuPost(Request $request)
    {
        $request->validate([
            'tenloai' => 'required',
        ], [
            'tenloai.required' => "Tiêu đề không để trống.",
        ]);
        $data['tendanhmuc'] = $request->tenloai;
        $data['slug'] = Str::slug($request->tenloai, '-');
        $data['mota'] = $request->mota;
        $data['trangthai'] = 1;
        $menuPost = MenuPosts::create($data);
        if ($menuPost) {
            return redirect()->route('get.typepost')->with('message', 'Đã thêm loại bài viết thành công.');
        } else {
            return redirect()->route('get.typepost')->with('message', 'Thêm loại bài viết thất bại.');
        }
    }
}
