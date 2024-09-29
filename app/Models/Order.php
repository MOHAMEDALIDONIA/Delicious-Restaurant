<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable=[
        'user_id',
        'tracking_no',
        'fullname',
        'phone',
        'address',
        'status',
        'instructions',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function orderitem(){
        return $this->hasMany(OrderItem::class,'order_id','id');
    }
}
