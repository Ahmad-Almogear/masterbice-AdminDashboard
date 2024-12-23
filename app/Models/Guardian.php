<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 
        'last_name',
        'relationship',
        'email', 
        'phone_number',
        'address'
    ];

    // علاقة "ولي الأمر إلى طالب"
    public function student()
    {
        return $this->hasOne(Student::class, 'guardian_id'); // علاقة ولي الأمر مع الطالب
    }

}
