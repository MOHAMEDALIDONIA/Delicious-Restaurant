<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table="settings";
    protected $fillable=[
        'website_name',
            'video_url',
            'time_work',
            'description',
            'address',
            'phone',
            'email',
            'facebook',
            'instagram',
            'twitter',
            'linkedin', 
    ];
}
