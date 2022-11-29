<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function index()
    {
        return view('templates.clients.account.register');
    }
    public function register(RegisterRequest $request)
    {
        if ($request->email) {
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);
            $data['diachi'] = $request->address;
            $data['ten'] = $request->hoten;
            $data['token'] = $request->_token;
            $data['trangthai'] = 0;
            if ($customer = Customer::create($data)) {
                Mail::send('templates.clients.account.verifyEmail', compact('customer'), function ($email) use ($customer) {
                    $email->subject('Drinks - Web');
                    $email->to($customer->email, ($customer->ten) ? $customer->ten : "");
                });
            }
            return redirect()->route('get.home')->with('activeAcc', 'Mã xác thực đã được gửi đến email của bạn, Vui lòng kiểm tra email xác thực tài khoản để có thể đăng nhập.');
        }
    }
    public function active(Customer $customer, $token)
    {

        if ($customer->token == $token) {
            $customer->update(['trangthai' => 1, 'token' => null]);
            return redirect()->back()->with('activeAcc', 'Tài khoản đã được kích hoạt thành công, bạn có thể đăng nhập');
        } else {
            return redirect()->back()->with('activeAcc', 'Tài khoản kích hoạt thất bại');
        }
    }
}
