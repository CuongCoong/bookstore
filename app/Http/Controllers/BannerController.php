<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function kho_banner()
    {
     $banner=Banner::inRandomOrder()->limit(4)->get();
   
        return view('admin.banner.kho',compact('banner'));
    }
    public function them(Request $req)
    {
        
         $req->validate([
             'banner'=>'required|image'
         ],[
            'banner.required'=>'Để trống thì tải sao được',
            'banner.image'=>'Ảnh chứ không phải mấy tệp khác!'
         ]);
    $ten=Str::random().$req->banner->getClientOriginalName();
    if($req->banner->move(public_path('banner'),$ten) ){
        Banner::create([
            'name_banner' => $ten
        ]);
        return redirect()->route('banner.kho')->with('yes','Thêm banner thành công');
       
        
    }

    
    }
    public function xoa(Banner $ban)
    {
        $ban->delete();
        return redirect()->route('banner.kho')->with('yes','Xóa banner thành công');
    }
}
