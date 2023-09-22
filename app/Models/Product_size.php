<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_size extends Model
{
    use HasFactory;
    protected $fillable =['length','width'];
    public function size()
    {
        return $this->hasMany(Product::class,'size_id','id');
    }
}
