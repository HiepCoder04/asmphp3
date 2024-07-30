<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('users.login');
    }
    public function postLogin(Request $req)
    {


        $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ], [
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Password không được để trống',

        ]);
        // if(Auth::attempt([
        //     'email' => $req->email,
        //     'password' => $req->password
        // ])){
        //     return redirect()->route('admin.products.list-product');
        // }else{
        //     return redirect()->back()->with([
        //         'message' =>'Email hoặc mật khẩu không đúng'
        //     ]);
        // }
        $dataUserlogin = [
            'email' => $req->email,
            'password' => $req->password
        ];
        $remember = $req->has('remember');
        if (Auth::attempt($dataUserlogin, $remember)) {
            if (Auth::User()->role == '1') {
                return redirect()->route('admin.product.listProduct')->with([
                    'message' => 'Đăng nhập thành công'
                ]);
            } else {
                return redirect()->route('users.home')->with([
                    'message' => 'Đăng nhập thành công với quyền User'
                ]);
            }
        } else {
            return redirect()->back()->with([
                'message' => 'Email hoặc mật khẩu không đúng'
            ]);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with([
            'message' => 'đăng xuất thành công'
        ]);
    }
    public function register()
    {
        return view('users.register');
    }
    public function postRegister(Request $req)
    {
        $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'name' => ['required']
        ], [
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Password không được để trống',
            'name' => 'Tên không được để trống',


        ]);

        $check = User::where('email', $req->email)->exists();
        if ($check) {
            return redirect()->back()->with([
                'message' => 'Email đã tồn tại'
            ]);
        } else {
            $data = [
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password)
            ];
            $newUser = User::create($data);
            // Auth::login($newUser);
            // return view('users.home')->with([
            //     'message' =>'Đăng kí thành công'
            // ]);
            return redirect()->route('login')->with([
                'message' => 'Đăng kí thành công! Trở về trang đăng nhập'
            ]);
        }
    }
}
