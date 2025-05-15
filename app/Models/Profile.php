<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'bio',
        'location',
        'skills',
        'phone',
        'profile_picture',  // added
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
