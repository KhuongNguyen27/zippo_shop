<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'products';
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withTrashed();
        
    }
    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
        
    }
}
