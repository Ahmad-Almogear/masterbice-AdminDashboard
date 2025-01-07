<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes;  // تفعيل الحذف الناعم

    protected $fillable = [
        'title',
        'description',
        'price',
        'seats',
        'start_date',
        'lectures_count',
        'hours_count',
        'teacher_name',
        'teacher_specialty',
        'teacher_image',
        'program_image',
    ];

    public function registrations()
    {
        return $this->hasMany(ProgramRegistration::class);
    }
}
