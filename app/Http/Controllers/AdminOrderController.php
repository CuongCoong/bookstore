<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Order_detail;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function don_hang()
    {
        $order=Order::OrderBy('id','DESC')->simplePaginate(8);
        $customer=Customer::all();
        return view('admin.order.danh_sach',compact('order','customer'));
    }
    public function info_order(Order $don)
    {
     
        $order=Order::all();
        $customer=Customer::all();
        $detail=Order_detail::all();
        $prod=Product::all();
        return view('admin.order.infoOrder',compact('customer','don','order','detail','prod'));
    }
    public function xac_nhan(Request $req,Order $don)
    {
        
        $id=$don->id;
        

        $data=$req->only('status');  
        $don->update(['status'=>$data['status']]);
        
       return redirect()->route('ad.don_hang')->with('yes','Cập nhật đơn hàng thành công!');
    }
}
