<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment_product extends Model
{
    use HasFactory;
    protected $fillable=['customer_id','user_id','product_id','content'];
}
