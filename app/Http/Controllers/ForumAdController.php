<?php

namespace App\Http\Controllers;

use App\Models\Comment_forum;
use App\Models\Image_forum;
use App\Models\Customer;
use App\Models\Feedback;
use App\Models\Forum;
use App\Models\Product;
use App\Models\User;
use App\Models\Write;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ForumAdController extends Controller
{
    public function forum()
    {
        $tin = Forum::orderBy('id','DESC')->simplePaginate(6);
        $customer = Customer::all();
        $anh_tin = Image_forum::all();
        $cmt = Comment_forum::OrderBy('id',"DESC")->simplePaginate(10);
        return view('admin.forum.index', compact('tin', 'customer', 'anh_tin', 'cmt'));
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
        $data = $req->only('content');
        if ($forum = Forum::create(
            [
                'user_id' => auth()->user()->id,
                'content' => $data['content'],
                'status' => 1
            ]
        )) {
            if ($req->image) {
                foreach ($req->image as $file) {
                    $name = Str::slug(Str::random().$req->banner->getClientOriginalName());
                    if ($file->move(public_path('forum'), $name)) {
                        Image_forum::create([
                            'forum_id' => $forum->id,
                            'image' => $name,

                        ]);
                    }
                }
            }
        }
        return redirect()->route('ad.forum')->with('yes', 'Ad đã đăng tin rồi đó!');
    }
    public function duyet()
    {
        $tin = Forum::SimplePaginate(6);
        $customer = Customer::all();
        $anh_tin = Image_forum::all();
        $cmt = Comment_forum::all();
        return view('admin.forum.duyet', compact('tin', 'customer', 'anh_tin', 'cmt'));
    }
    public function post_duyet(Request $req, Forum $duyet)
    {
        $data = $req->only('status');
        $duyet->update(['status' => $data['status']]);
        return redirect()->route('ad.forum')->with('yes', 'Ad đã duyệt tin rồi đó!');
    }
    public function comment_ad(Request $req)
    {
        $req->validate([
            'comment'=>'required'
        ],[
            'comment.required'=>'Hãy nói gì đó chứ đừng im lặng!'
        ]);
        $data = $req->only('comment', 'forum_id');

        Comment_forum::create([
            'user_id' => auth()->user()->id,
            'comment' => $data['comment'],
            'forums_id' => $data['forum_id'],
        ]);
        return redirect()->route('forum.comment', $data['forum_id']);
    }
    public function info(Forum $forum)
    {
        $admin = User::all();
        $customer = Customer::all();
        $anh_tin = Image_forum::all();
        $cmt = Comment_forum::OrderBy('id','DESC')->simplePaginate(10);
        return view('admin.forum.info', compact('forum', 'customer', 'anh_tin', 'cmt', 'admin'));
    }
   
   
   
   
   public function xoa_forum(Forum $forum)
    {
        $sl_cmt=$forum->cmt_forum()->count();
        $sl_img=$forum->img_forum()->count();
        $img = Image_forum::where('forum_id','=', $forum->id);
        $cmt = Comment_forum::where('forums_id','=',$forum->id);
        
        
        $stt = $forum->status;
    
    
        if ($stt == 1) {
            if($sl_cmt == 0 && $sl_img == 0) {
                $forum->delete();
                return redirect()->route('ad.forum')->with('yes', 'Đã xóa bài viết!');
            }
            elseif ($sl_cmt>0 || $sl_img>0) {
                $img->delete();
                
                $cmt->delete();
                $forum->delete();
                return redirect()->route('ad.forum')->with('yes', 'Đã xóa bài viết cùng ' . $sl_cmt . ' lượt bình luận và ' .$sl_img. ' ảnh!');
            } 

        } else {
            if ($forum->img_forum()->count() > 0) {
                $img->delete();
                $forum->delete();
                return redirect()->route('ad.forum')->with('yes', 'Đã từ chối bài viết và' . $sl_img . ' ảnh!');
            } else {
                $forum->delete();
                return redirect()->route('ad.forum')->with('yes', 'Đã từ chối bài viết!');
            }
        }
    }
public function ad_feedback()
{
  $fb=  Feedback::OrderBy('id','DESC')->simplePaginate(5);
    return view('admin.feedback',compact('fb'));
}


public function xoa_fb(Feedback $fb)
{
  
    $fb->delete();
    return redirect()->route('ad_feedback')->with('yes','Nhớ rút kinh nghiệm nghe chưa');
}
public function triet_li()
{
  $tl =  Write::OrderBy('id','DESC')->simplePaginate(5);
    return view('index.triet_li',compact('tl'));
}
public function post_triet_li(Request $req)
{
    $req->validate([
        'write'=>'required',
        'user_name'=>'required'
    ],[
        'write.required'=>'Văn của bạn đâu hết rồi!',
        'user_name.required'=>'Dù không phải của bạn nhưng bạn nên tự hào về việc chia sẻ nó!'
    ]);
    $data=$req->only('write','user_name');
    Write::create([
        'write'=>$data['write'],
        'user_name'=>$data['user_name'],
    ]);
    return redirect()->back()->with('yes','Đọc thấm đượm tình người!');
}



}
