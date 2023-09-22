<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Order_detail;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['name','email','phone','address','order_note','customer_id','status'];
    public function details()
    {
        return $this->hasMany(Order_detail::class,'order_id','id');
        
    }
    public function getTotal()
        {
           $total =0;
           foreach($this->details as $dt){
            $total += $dt->price * $dt->quantity;
           }
           return number_format($total);
        }
    public function cus()
    {
        return $this->hasOne(Customer::class,'id','customer_id');
    }
    
   
}
