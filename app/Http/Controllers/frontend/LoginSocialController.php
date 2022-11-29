<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Products;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Laravel\Socialite\Facades\Socialite;

class LoginSocialController extends Controller
{
    public function loginAcc(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::guard('customer')->attempt(['email' => $email, 'password' => $password, 'trangthai' => 1])) {
            return true;
        } else {
            $cus = Customer::where('email', $request->email)->first();
            if ($cus) {
                if ($cus->trangthai == 0) {
                    return Response::json(['loginAcc' => 'Tài khoản chưa được kích hoạt. <br>Vui lòng nhấn <a href="' . route('re.sendMail', $cus->email) . '">vào đây </a>để kích hoạt']);
                } else {
                    return Response::json(['loginAcc' => 'Mật khẩu không chính xác.']);
                }
            } else {
                return Response::json(['loginAcc' => 'Email không tồn tại.']);
            }
        }
    }
}
