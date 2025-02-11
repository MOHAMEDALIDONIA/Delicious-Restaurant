<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="categories";
    protected $fillable=[
        'name','slug','status'
    ];
    public function food(){
        return $this->hasMany(Food::class,'category_id','id');
    }
}
