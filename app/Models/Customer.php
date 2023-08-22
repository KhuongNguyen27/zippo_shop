<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Authenticatable
{
    use HasFactory;
    public $table = 'customers';
    public function order()
    {
        return $this->hasMany(Order::class,'customer_id', 'id');
    }
    protected $fillable = [
        'name', 'email', 'image', 'email_token', 'email_refresh_token'
    ];
    protected $guarded = [
        'day_of_birth','gender','address','phone','password'
    ];
}
