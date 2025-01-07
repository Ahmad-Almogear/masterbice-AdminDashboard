<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'description',
        'event_date',
        'event_time',
        'price',
        'image',
    ];

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }
}
