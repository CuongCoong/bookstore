<?php

namespace App\Http\Controllers;

use App\Models\Product_size;
use Illuminate\Http\Request;

class SIzeController extends Controller
{
    public function danh_sach()
    {
        $data = Product_size::paginate(5);
        return view('admin.kich_co.danh_sach',compact('data'));
    }
    public function them()
    {
        
        return view('admin.kich_co.them');
    }
    public function add(Request $req)
    {
        $req->validate([
            'width'=>'required|numeric|lt:length',
            'length'=>'required|numeric|'
        ],[
            'width.required'=>'Ngắn dài không quan trọng đúng không',
            'length.required'=>'Ngắn dài không quan trọng đúng không',
            'width.lt'=>'Một đứa trẻ lớp 2 nó đã biết tính chu vi rồi đấy'
        ]);
        $data= $req->only('length','width');
       
       Product_size::create([
        'length'=>$data['length'],
        'width'=>$data['width'],
       ]);
        return redirect()->route('kc.danh_sach')->with('yes','Thêm kích cỡ thành công!');
    }
   
    public function xoa(Product_size $kc)
    {
        if($sl=$kc->size()->count()>0){
          return redirect()->back()->with('no','Xoá không thành công vì có '.$sl.' sản phẩm đang sử dụng!');
        }


        $kc->delete();
        
        return redirect()->route('kc.danh_sach')->with('No','Xóa Thành công');
    }
}
