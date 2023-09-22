<?php

namespace App\Http\Controllers;
use App\helper\gio_hang;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //view giỏ hàng
    public function thong_tin(gio_hang $gio_hang)
    {
     return  view('index.gio_hang',compact('gio_hang'));
    }
    //giỏ hàng lúc nào cũng dùng
    public function them(Product $sp,gio_hang $gio_hang)
    {
        $gio_hang->them($sp);
        return redirect()->route('gio_hang.thong_tin')->with('yes','Đã thêm vào giỏ hàng');
    }
    public function sua($id,gio_hang $gio_hang,Request $req)
    {
        $req->validate([
            'so_luong'=>'numeric|required',
        ],[
            'so_luong.numeric'=>'Bạn hiểu số là gì khônng',
            'so_luong.required'=>'Mua hay không mua vậy bạn'
        ]);
        $so_luong=$req->only('so_luong')>0?$req->only('so_luong'):1;
   
        $gio_hang->sua($id,$so_luong);
        return redirect()->route('gio_hang.thong_tin')->with('yes','Đã sửa số lượng trong giỏ hàng');
    }
    public function xoa(Product $sp,gio_hang $gio_hang)
    {
        $gio_hang->xoa($sp->id);
        return redirect()->route('gio_hang.thong_tin')->with('yes','Đã xóa khỏi giỏ hàng');
    }
    public function huy(gio_hang $gio_hang)
    {
        $gio_hang->huy();
        redirect()->back()->with('Yes','Đã xóa tất cả trong giỏ');
    }
    
}
