<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_forum extends Model
{
    use HasFactory;
    protected $fillable=['forum_id','image'];
   
}
