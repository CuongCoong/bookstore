<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment_forum extends Model
{
    use HasFactory;
    protected $fillable=['user_id','customer_id','forums_id','comment'];
   
}
