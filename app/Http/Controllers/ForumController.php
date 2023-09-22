<?php

namespace App\Http\Controllers;

use App\Models\Comment_forum;
use App\Models\Customer;
use App\Models\Forum;
use App\Models\Image_forum;
use App\Models\Product;
use App\Models\Rep_comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ForumController extends Controller
{
    public function forum()
    {
       
        $new = Product::orderBy('id', 'DESC')->limit(2)->get();
        $tin = forum::SimplePaginate(6);
        $customer=Customer::all();
        $anh_tin=Image_forum::all();
        $cmt=Comment_forum::OrderBy('id','DESC')->get();
        $sp_random1= Product::inRandomOrder()->limit(6)->get();
        return view('index.forum', compact('new','tin','customer','anh_tin','cmt','sp_random1'));
    }

    public function post_forum(Request $req)
    {
        
        $req->validate([
            'content'=>'required',
            'image'=>'image'
        ],[
            'content.required'=>'Hãy nói gì đó chứ đừng im lặng!',
            'image.image'=>'(Ở đây sương khói mờ nhân ảnh) Ảnh chứ không phải là tệp'
        ]);
        $data = $req->only( 'content');
        if ($forum = Forum::create(
            [
                'customer_id' => auth('cus')->user()->id,
                'content' => $data['content'],
                'status' => 2
            ]
        )) {
            if ($req->image) {
                foreach ($req->image as $file) {
                    $name = Str::random() . $file->getClientOriginalName();
                    if ($file->move(public_path('forum'), $name)) {
                        Image_forum::create([
                            'forum_id' => $forum->id,
                            'image' => $name,

                        ]);
                    }
                }
            }
        }
        return redirect()->route('index.forum')->with('yes', 'Bạn đã đăng tin vui lòng chờ duyệt!');
    }
    public function comment(Request $req)
    {
        
        $req->validate([
            'comment'=>'required'
        ],[
            'comment.required'=>'Hãy nói gì đó chứ đừng im lặng!'
        ]);
        $data=$req->only('comment','forum_id');
        
        Comment_forum::create([
            'customer_id'=>auth('cus')->user()->id,
            'comment'=>$data['comment'],
            'forums_id'=>$data['forum_id'],
        ]);
        return redirect()->route('forum.info',$data['forum_id']);
    }
    public function info(Forum $forum)
    {
        
        $admin=User::all();
        $customer=Customer::all();
        $anh_tin=Image_forum::all();
        $cmt=Comment_forum::OrderBy('id','DESC')->simplePaginate(20);
        $sp_random1= Product::inRandomOrder()->limit(6)->get();
        return view('index.cmtForum', compact('forum','customer','anh_tin','cmt','sp_random1','admin'));
        
    }
 
}
