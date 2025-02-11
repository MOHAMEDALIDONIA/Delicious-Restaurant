<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    use HasFactory;
    protected $table="chefs";
    protected $fillable=[
        'name','title','image'
        ,'facebook'
        ,'instagram'
        ,'twitter'
        ,'linkedin' 
    ];
}
