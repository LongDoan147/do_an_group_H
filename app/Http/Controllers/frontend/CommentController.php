<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;
use Carbon\Carbon;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        $customer = get_user('customer', 'id');
        if ($customer) {
            $data = [
                'noidung' => $request->content,
                'id_khachhang' => $customer,
                'id_sanpham' => ($request->type == 'product') ? $request->id : null,
                'id_baiviet' => ($request->type == 'post') ? $request->id : null,
                'type' => $request->type,
                'ngaybl' => Carbon::now('Asia/Ho_Chi_Minh'),
                'parent_id' => $request->id_reply ? $request->id_reply : 0
            ];
            Comments::create($data);
            if ($request->type == 'product') {
                $comments = Comments::where('id_sanpham', $request->id)
                    ->where('type', 'product')
                    ->where('parent_id', 0)->get();
            } else {
                $comments = Comments::where('id_baiviet', $request->id)
                    ->where('type', 'post')
                    ->where('parent_id', 0)->get();
            }
            $viewData = [
                'comments' => $comments
            ];
            return view('templates.clients.product.comments', $viewData);
        }
    }
}
