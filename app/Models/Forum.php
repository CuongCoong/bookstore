<?php

namespace App\Models;

use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    protected $fillable=['ad_or_cus','user_id','customer_id','content','status'];
    public function cmt_forum()
    {
        return $this->hasMany(Comment_forum::class,'forums_id','id');
    }
    public function img_forum()
    {
        return $this->hasMany(Image_forum::class,'forum_id','id');
    }
    
   
    
}
