<?php

namespace App\Http\Controllers;

use App\helper\gio_hang;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function thanh_toan()
    {
       return view('index.order.dat_hang');
    }
    public function post_thanh_toan(Request $req,gio_hang $gio_hang)
    {
        $req->validate(['email'=>'required',
        'name'=>'required',
        'phone'=>'required|numeric|max:9999999999',
        'address'=>'required','order_note'=>'required'],
        [
            'phone.max'=>'số điện thoại có bao nhiêu số',
            'email.required'=>'Thời 4.0 rồi mà!',
            'name.required'=>'Tên người nhận là gì vậy bạn ơi!',
            'phone.required'=>'Chúng mình không nháy máy!',
            'address.required'=>'Nổ địa chỉ đi mình hứa shipper đến tận nhà bạn luôn!',
            'order_note.required'=>'Hãy nhắn gửi những lời yêu thương bạn nhé!',
            'phone.numeric'=>'Chữ số không phải chữ cái!'
        ]);
        $data=$req->only('email','name','phone','address','order_note');
        $data['customer_id']=auth('cus')->user()->id;
        if($order = Order::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
            'address'=>$data['address'],
            'order_note'=>$data['order_note'],
            'customer_id'=>$data['customer_id']
        ])){
            foreach($gio_hang->gio_hang as $gio){
              
                $detail=[
                    
                    'order_id'=>$order->id,
                    'product_id'=>$gio['id'],
                    'quantity'=>$gio['so_luong'],
                    'price'=>$gio['gia']
                ];
                Order_detail::create($detail);


            }
            $gio_hang->huy();
            return redirect()->route('index')->with('yes','Đặt hàng thành công!');
        }
        return redirect()->back()->with('no','Đặt hàng không thành công');
    }
    public function lich_su()
    {
         $sp_random1= Product::inRandomOrder()->limit(2)->get();
        $cus=auth('cus')->user();
        $orders=$cus->orders;
        return view('index.order.lich_su',compact('orders','sp_random1'));
    }
    public function chi_tiet(Order $don)
    {
        $sp_random1= Product::inRandomOrder()->limit(2)->get();
        return view('index.order.infoOrder',compact('don','sp_random1'));
    }
    
}
