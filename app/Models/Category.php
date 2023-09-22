<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
protected $fillable =['name','age'];
public function danh_muc()
{
    return $this->hasMany(Product::class,'category_id','id');
}
}
