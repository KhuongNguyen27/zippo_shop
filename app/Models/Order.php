<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'orders';
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
        
    }
    // public function orderdetail()
    // {
    //     return $this->hasMany(OrderDetail::class, 'order_id', 'id');
        
    // }
}
