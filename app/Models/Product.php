<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['name','category_id','price','sale_price','size_id','avatar','describe'];
    public function san_pham()
    {
        return $this->hasMany(Product_image::class,'product_id','id');
    }
    public function cmt()
    {
        return $this->hasMany(Comment_product::class,'product_id','id');
    }
    public function order()
    {
        return $this->hasMany(Order_detail::class,'product_id','id');
    }



}
