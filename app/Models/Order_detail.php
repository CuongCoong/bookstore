<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Order_detail extends Model
{
    use HasFactory;
    protected $fillable=['order_id','product_id','quantity','price'];
public function product()
{
    return $this->hasOne(Product::class,'id','product_id');
}

}

