<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment_product;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Feedback;
use App\Models\Forum;
use App\Models\Order_detail;
use App\Models\Product_image;
use App\Models\Product_size;
use App\Models\Rep_comment;
use App\Models\User;
use App\Models\Write;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $sl_dm = 0;
        $sl_sp = 0;
        $sl_bv=0;
        $sl_db=0;
        $san_pham = Product::all();
        $san_pham_global = Product::orderBy('id', 'desc')->simplePaginate(8);
        $dm_global = Category::orderBy('id', 'desc')->get();
        $sp_random = Product::inRandomOrder()->limit(2)->get();
        $dm_random = Category::inRandomOrder()->limit(3)->get();
        $order=Order_detail::all();
        $fr=Forum::all();

        foreach ($order as $o) {
            $sl_db++;
        }
        foreach ($fr as $f) {
            $sl_bv++;
        }
        foreach ($san_pham as $sp) {
            $sl_sp++;
        }
        $danh_muc = Category::all();
        foreach ($danh_muc as $dm) {
            $sl_dm++;
        }
        return view('index.home', compact('sl_sp', 'sl_dm', 'san_pham_global', 'dm_global', 'sp_random', 'dm_random','sl_bv','sl_db'));
    }
    public function thong_tin(Product $sp)
    {
        $triet=Write::inRandomOrder()->limit(3)->get();
        $dm_global = Category::orderBy('id', 'desc')->get();
        $kc_global = Product_size::orderBy('id', 'ASC')->get();
        $anh_khac = Product_image::all();
        $cmt=Comment_product::OrderBy('id','DESC')->get();
        $admin=User::all();
        $customer=Customer::all();
        return view('index.thong_tin', compact('sp', 'anh_khac', 'dm_global', 'kc_global','cmt','admin','customer','triet'));
    }
    public function gian_hang()
    {
        $san_pham_global = Product::orderBy('id', 'desc')->simplePaginate(8);
        $dm_global = Category::orderBy('id', 'desc')->get();
        $sp_random1 = Product::inRandomOrder()->simplePaginate(8);
        return view('index.gian_hang', compact('sp_random1', 'dm_global', 'san_pham_global'));
    }
    public function dang_nhap()
    {
        return view('index.login.dang_nhap');
    }
    public function check(Request $req)
    {
        $req->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'password.required'=>'Bạn cố tình à!',
            'email.required'=>'Bạn cố tình à!',

        ]);
        $data = $req->only('email', 'password');
        $check = auth('cus')->attempt($data, $req->has('remember'));
        if ($check) {
            return redirect()->route('index')->with('yes', 'Chào mừng bạn trở lại');
        }
        return redirect()->back()->with('no', 'Tài khoản hoặc mật khẩu không chính xác');
    }
    public function logout()
    {
        auth('cus')->logout();
        return redirect()->route('index')->with('no','Bạn đã đăng xuất nhiều chức năng không dùng được');
    }
    public function dang_ki()
    {
        return view('index.login.dang_ki');
    }
    
     function dangki(Request $req)
    {
        $req->validate([
            'password'=>'required',
            'email'=>'required|unique:customers',
            'phone'=>'required|numeric|max:9999999999|unique:customers',
            'password_confirmation'=>'required|same:password',
            'address'=>'required',
            'avatar'=>'required',
        ],[

            'phone.unique'=>'Số này có người đăng kí rồi',
            'email.unique'=>'email này có người đăng kí rồi',
            'phone.max'=>'số điện thoại có bao nhiêu số',

            'password.required'=>'Bạn cố tình à!',
            'email.required'=>'Bạn cố tình à!',
            'phone.required'=>'Bạn cố tình à!',
            'password_confirmation.required'=>'Bạn cố tình à!',
            'address.required'=>'Bạn cố tình à!',
            'avatar.required'=>'Bạn cố tình à!',
            'phone.numeric'=>'Số hay chữ vậy bạn ơi!',
            'password_confirmation.same'=>'Mới nhập đã quên à',

        ]);
        $data = $req->only('name', 'phone', 'email', 'password', 'password_confirmation', 'address');
        $anh1 = Str::random() . $req->avatar->getClientOriginalName();
        if ($req->avatar->move(public_path('avatar'), $anh1)) {
            $cus = Customer::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'phone' => $data['phone'],
                'address' => $data['address'],
                'avatar' => $anh1,

            ]);
            auth('cus')->loginUsingId($cus->id);
            return redirect()->route('index')->with('yes', 'Đăng kí thành công');
        }
    }
    public function info_cus(Customer $cus)
    {
        return view('index.login.info_cus', compact('cus'));
    }
    
    
    
    public function post_cus(Request $req, Customer $cus)
    {
        $req->validate([
            
            
            'name'=>'required',
            'phone'=>'required|numeric|max:9999999999|unique:customers',
            
            'address'=>'required',
            'phone.numeric'=>'Số hay chữ vậy bạn ơi!',
            
        ],[
            'phone.unique'=>'Số này có người đăng kí rồi',
            
            'phone.max'=>'số điện thoại có bao nhiêu số',
            'address.required'=>'Bạn cố tình à!',
            'phone.numeric'=>'Bạn cố tình à!',
            'phone.required'=>'Bạn cố tình à!',
            'name.required'=>'Bạn cố tình à!',
        ]);
        $data = $req->only('name', 'phone', 'address');
        if ($req->avatar) {
            $anh1 = Str::random() . $req->avatar->getClientOriginalName();
            if ($req->avatar->move(public_path('avatar'), $anh1)) {
                $cus->update([
                    'name' => $data['name'],
                    'phone' => $data['phone'],
                    'address' => $data['address'],
                    'avatar' => $anh1,

                ]);
            }
        } else {
            $cus->update([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'address' => $data['address'],
            ]);
        }


        return redirect()->route('index')->with('yes', 'Cập nhật thành công');
    }
    public function pass()
    {
        return view('index.login.doi_pass');
    }


    public function post_pass(Request $req)
    {

        $req->validate([
            'old_password' => [' required', function ($attribute, $value, $fail) {
                $cus = auth('cus')->user();
                $check = Hash::check($value, $cus->password);
                if (!$check) {
                    return $fail('Mật khẩu cũ không chính xác!');
                }
            }],
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);


        $new = bcrypt($req->password);
        $cus = auth('cus')->user();
        $cus->update(['password' => $new]);
        return redirect()->route('index')->with('yes', 'Thay đổi mật khẩu thành công!');
    }
    public function search()
    {
        $key = request('key');
        $dm_global = Category::orderBy('id', 'desc')->get();
        $san_pham = Product::where('name', 'LIKE', '%' . $key . '%')->simplePaginate(8);
        $stt = Forum::where('content', 'LIKE', '%' . $key . '%')->simplePaginate(6);
        $dm1=Category::where('name','LIKE', '%' . $key . '%')->get();
        $prod=Product::simplePaginate(6);
    


        $m=0;$n=0;$o=0;$p=0;
        foreach($san_pham as $sp){
            $m++;
            $n++;
        }
        foreach($stt as $t){
            $m++;
            $o++;
        }
        foreach($dm1 as $d){
            $m++;
            $p++;
        }


        return view('index.search', compact('san_pham', 'stt','dm1','prod','dm_global','m','n','o','p'));
    }
    public function cmt_sp(Request $req,Product $sp)
    {
        $req->validate(
            [
                'content'=>'required'
            ],[
                'content.required'=>'Đừng im lặng vậy mà!'
            ]);
        $data=$req->only('content');
        
        $data['cus_id']=auth('cus')->user()->id;
     
      
        Comment_product::create([
            'product_id'=>$sp->id,
            'customer_id'=>$data['cus_id'],
            'content'=>$data['content']

        ]);


        return redirect()->route('index.thong_tin',$sp->id)->with('yes','Cảm ơn bạn đã tương tác!');
    }
    public function feedback()
    {
        return view('index.lien_he');
    }
    public function post_feedback(Request $req)
    {
        $req->validate([
            'name'=>'required','email'=>'required','content'=>'required','phone'=>'required|numeric|max:9999999999'
        ],[
            'phone.max'=>'số điện thoại có bao nhiêu số',
            'name.required'=>'Xin biết quý danh',
            'email.required'=>'Không để trống',
            'content.required'=>'Định nói gì nào',
            'phone.required'=>'Chúng tôi không nháy máy',
            'phone.numeric'=>'Bạn lớp mấy vậy'
        ]);
        $data=$req->only('name','email','content','phone');
        Feedback::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
            'content'=>$data['content'],
        ]);
        return redirect()->route('index')->with('yes','Cảm ơn bạn đã góp ý');
    }
}
