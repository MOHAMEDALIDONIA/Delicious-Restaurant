<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
      'user_id','food_id','quantity'
    ];
    public function food(){
      return   $this->belongsTo(Food::class,'food_id','id');
    }
}
