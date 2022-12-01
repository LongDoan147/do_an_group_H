<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\sendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller

{
    //
    public function show(){
        return view('templates.admins.index');
    }
    public function infologin()
    {
        $idLogin = auth()->user()->id;
        $getLogin = User::where('id', $idLogin)->first();
        return view('admin_pages.infologin.index', compact('getLogin'));
    }

    public function changepasswview()
    {
        return view('admin_pages.infologin.changepass');
    }

    public function changepassw(Request $req)
    {
        $oldpass = $req->oldpass;
        $newpass = $req->newpass;
        $idLog = auth()->user()->id;
        $getAccountLogin = User::where('id', $idLog)->first();
        $emailUser = $getAccountLogin->email;
        $getPass = $getAccountLogin->password;
        if (Hash::check($oldpass, $getPass)) {
            $user = User::find($idLog);
            $user->password = bcrypt($newpass);
            $user->save();
            $mailable = new sendMail($newpass);
            Mail::to($emailUser)->send($mailable);
            $idLogin = auth()->user()->id;
            $getLogin = User::where('id', $idLogin)->get();
            session()->put('change_pass', 'Thay đổi mật khẩu thành công');
        }

        Auth::logout();
        return redirect('admin');
        // $idLogin = auth()->user()->id;
        // $getLogin = User::where('id', $idLogin)->get();
        // return view('admin_pages.infologin.index', compact('getLogin'));
    }
}
