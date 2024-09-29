<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table= "booking";
    protected $fillable = [
            'user_id',
            'phone',
            'number_people',
            'table_id',
            'message',
            'day_booking',
            'time_booking',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function tables(){
        return $this->belongsTo(Table::class,'table_id','id');
    }
}
