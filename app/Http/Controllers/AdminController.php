<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        //dd(auth()->user()->avatar);
        return view('admin.index');
    }
    public function login()
    {
       //dd(bcrypt(123456)); //mã hóa

        return view('admin.login');
    }
    public function login_ad(Request $req)
    {
        $data=$req->only('email','password');
        //dd($data);
      $check = Auth::attempt($data,$req->has('remember'));
       if($check){
        return redirect()->route('index_ad')->with('yes','Chào mừng trở lại');
       }
       return redirect()->back()->with('no','Tài Khoản Hoặc Mật Khẩu Không Chính Xác');
    }
    public function logout()
    {
        
        Auth::logout();
        return redirect()->route('admin.login')->with('yes','Đừng buồn chuyện hôm nay bạn chưa giải quyết được vì mai bạn chẳng giải quyết được đâu!');
    }
    
}