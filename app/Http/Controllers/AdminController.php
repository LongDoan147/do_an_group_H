<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;

class AdminController extends Controller
{
    public function getComment()
    {
        $comments = Comments::paginate(10);
        return view('admin_pages.static.comments', ['comments' => $comments]);
    }
}
