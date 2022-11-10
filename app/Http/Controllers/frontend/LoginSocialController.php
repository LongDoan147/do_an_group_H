<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class LoginSocialController extends Controller
{
    public function login($type)
    {
        switch ($type) {
            case 'facebook':
                return  Socialite::driver('facebook')->redirect();
                break;
            case 'google':
                return  Socialite::driver('google')->redirect();
                break;
        }
    }

    public function callback($type)
    {
        if ($type == 'facebook') {
            $users = Socialite::driver($type)->user();
        } else if ($type == 'google') {
            $users = Socialite::driver('google')->user();
        }
        $authUsers = Customer::where('email', $users->email)->first();
        if ($authUsers != null && $authUsers->id_social != $users->id) {
            return redirect()->route('get.home')->with('activeAcc', 'Tài khoản đã được tạo với nền tảng khác.');;
        }
        $authUser = ($authUsers) ? $authUsers : $this->CreateUser($users, $type);
        if (Auth::guard('customer')->attempt(['email' => $authUser->email, 'password' => $authUser->type_social])) {
            return  redirect::to('/')->with('messageLogin', 'Đã đăng nhập !');
        } else {
            return  redirect::to('/')->with('messageLogin', 'Đăng nhập thất bại !');
        }
    }
}
