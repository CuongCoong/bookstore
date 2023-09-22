<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Danh_muc;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function danh_sach(Request $req)
    {
        
        $data = Category::paginate(3);
        $key = $req->key;
        if($key){
            $data = Category::where('name','LIKE','%'.$key.'%')->simplePaginate(3);
            
        }
       
        return view('admin.danh_muc.danh_sach',compact('data','key'));
    }
    public function them()
    {
        return view('admin.danh_muc.them');
    }
    public function add(Request $req)
    {
        $req->validate([
            'name' => 'unique:categories|required'
        ],
        
        [
            'name.unique' => 'Không ai tắm hai lần trên một dòng sông!',
            'name.required' =>'Bạn đã từng chưa đi chợ mà đã hết tiền chưa???'
        ]);
       $data= $req->only('name','age');
       Category::create($data);
        return redirect()->route('dm.danh_sach')->with('yes','Thêm danh mục thành công!');
    }


    
    public function sua(Category $dm)
    {
        return view('admin.danh_muc.sua',compact('dm'));
    }



    public function update(Category $dm, Request $req)
    {
        $req->validate([
            'name' => 'unique:categories|required'
        ],
        [
            'name.unique' => 'Không ai tắm hai lần trên một dòng sông!',
            'name.required' =>'Bạn đã từng chưa đi chợ mà đã hết tiền chưa???'
        ]);
        $data = $req->only('name','age');
        $dm->update($data);
        return redirect()->route('dm.danh_sach')->with('yes','Sửa thành công!');
    }
    public function xoa(Category $dm)
    {
       if($dm->danh_muc()->count()==0){
        $dm->delete();
        return redirect()->route('dm.danh_sach')->with('yes','Xóa thành công');
       }else
       return redirect()->route('dm.danh_sach')->with('no','Xóa không thành công, vì có '.$dm->danh_muc()->count().' sản phẩm đang dùng');
    }

    
}
