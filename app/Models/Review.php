<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    
    protected $fillable = [
       'review',
       'rating',
    ];

    public function user()
    {
    return $this->belongsTo(User::class);
    }

    public function reviewable()
    {
    return $this->morphTo();
    }
 

    
}
