<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment_product;
use App\Models\Order_detail;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Product_size;
use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function thu_vien(Request $req)
    {

        

        $kich_co= Product_size::all();
        $dm=Category::all();
        $key=$req->key;
        $data=Product::OrderBy('id','DESC')->simplePaginate(5);
        if($key){
            
            $data=Product::Where('name','LIKE','%'.$key.'%')->simplePaginate(5);
        }
        return view('admin.san_pham.thu_vien',compact('data','dm','kich_co','key'));
    }
    public function them()
    {
        
        $kich_co=Product_size::OrderBy('id','ASC')->get();
        $danh_muc=Category::OrderBy('id','DESC')->get();
      
        return view('admin.san_pham.them',compact('danh_muc','kich_co'));
    }
    public function add(Request $req)
    {
        $req->validate([
            'name'=>'required|unique:products',
            'category_id'=>'required',
            'price'=>'required|numeric|max:10000000',
            'sale_price'=>'numeric|lt:price|max:10000000',
            'describe'=>'required',
            'avatar'=>'image|required',
            'size_id'=>'required',
            
        ],
        [
            'price.max'=>'Bạn bán đắt thế!',
            'avatar.required'=>'Người mù mà nhìn thấy thì phản cảm lắm ',
            'sale_price.lt'=>'Chiến thần sale',
            'name.required'=>'Bạn đã từng đi chợ mà hết tiền chưa???',
            'name.unique'=>'Không ai tắm hai lần trên một dòng sông',
            'category_id.required'=>'Bạn không dùng tới mắt thì có thể cho những người đang cần',
            'price.required'=>'Bạn uống lã để sống à???',
            'price.numeric'=>'Đừng buồn, không có thực lực không có gì phải buồn  ',
            'describe.required'=>'Tiếng Việt tuyệt vời lắm! Bạn có muốn học không?  ',
            'avatar.image'=>'Ở đây sương khói mờ nhân ảnh(Ảnh chứ không phải tệp)',
            'size_id.required'=>'Ngắn dài không quan trọng đúng không???',
             
        ]);
        $data=$req->only('name','category_id','price','sale_price','size_id','describe','avatar');
        $anh = $req->avatar->getClientOriginalName();
        $anh1= Str::random(). $anh;
        if($req->avatar->move(public_path('anh_san_pham'),$anh1)){
            $data['avatar']=$anh1;
        }
       
       
        if($sp=Product::create([
            'name'=>$data['name'],
            'category_id'=>$data['category_id'],
            'price'=>$data['price'],
            'sale_price'=>$data['sale_price'],
            'size_id'=>$data['size_id'],
            'describe'=>$data['describe'],
            'avatar'=>$data['avatar']]))
{

            if($req->image){
                if ( ($req->image)) {
                    foreach($req->image as $file) {
                        $file_name1 = Str::random(). $file->getClientOriginalName();
                        if ($file->move(public_path('anh_san_pham'), $file_name1)) {
                            Product_image::create([
                                'product_id' => $sp->id,
                                'image' => $file_name1,
                                
                            ]);
                        }
                    }
                }
        }
        return redirect()->route('sp.thu_vien')->with('yes','Sách đã đăng lên');

    }}
    
    public function sua(Product $sp)
    {

        
        $kich_co=Product_size::OrderBy('id','ASC')->get();
        $danh_muc=Category::OrderBy('id','DESC')->get();
    
        return view('admin.san_pham.sua',compact('danh_muc','kich_co','sp'));
    }
    public function update(Product $sp, Request $req)
    {
        $req->validate([
            'name'=>'required|unique:products',
            'category_id'=>'required',
            'price'=>'required|numeric|max:1000000000',
            'sale_price'=>'numeric|lt:price|max:1000000000',
            'describe'=>'required',
            'avatar'=>'image',
            'size_id'=>'required',
            
        ],
        [
           
            'sale_price.lt'=>'Chiến thần sale',
            'name.required'=>'Bạn đã từng đi chợ mà hết tiền chưa???',
            'name.unique'=>'Không ai tắm hai lần trên một dòng sông',
            'category_id.required'=>'Bạn không dùng tới mắt thì có thể cho những người đang cần',
            'price.required'=>'Bạn uống lã để sống à???',
            'price.numeric'=>'Đừng buồn, không có thực lực không có gì phải buồn  ',
            'describe.required'=>'Tiếng Việt tuyệt vời lắm! Bạn có muốn học không?  ',
            'avatar.image'=>'Ở đây sương khói mờ nhân ảnh(Ảnh chứ không phải tệp)',
            'size_id.required'=>'Ngắn dài không quan trọng đúng không???',
             
        ]);
        $data=$req->only('name','category_id','size_id','price','sale_price','kich_co','describe');
        if($req->avatar){
            $anh=$req->avatar;
            $anh1 = Str::random(). $anh->getClientOriginalName();
        if($req->avatar->move(public_path('anh_san_pham'),$anh1)){
        $sp->update([
            'name'=>$data['name'],
            'category_id'=>$data['category_id'],
            'price'=>$data['price'],
            'sale_price'=>$data['sale_price'],
            'size_id'=>$data['size_id'],
            'describe'=>$data['describe'],
            'avatar'=>$anh1
        ]);
        
    }}else{
        $sp->update([
            'name'=>$data['name'],
            'category_id'=>$data['category_id'],
            'price'=>$data['price'],
            'sale_price'=>$data['sale_price'],
            'size_id'=>$data['size_id'],
            'describe'=>$data['describe'],
            
            
        ]); 
    }
    return redirect()->route('sp.thu_vien')->with('yes','Cập nhật thành công');
}


 public function xoa(Product $sp)
 {
   


    $cmt=Comment_product::where('product_id','=',$sp->id);
    $cmt->delete();
    if($sp->order()->count()>0){
        return redirect()->back()->with('no','Không thể xóa vì đã có đơn hàng tới sản phẩm này!');
    }
       if($sp->san_pham()->count()>0){
        $ak=Product_image::where('product_id','=',$sp->id);
        $sl=$sp->san_pham()->count();
        $ak->delete();
        $sp->delete();
        return redirect()->route('sp.thu_vien')->with('yes','Xóa thành công cùng với '.$sl.' ảnh khác');
    }
    else{
    $sp->delete();
    return redirect()->route('sp.thu_vien')->with('yes','Xóa thành công!');}

}}