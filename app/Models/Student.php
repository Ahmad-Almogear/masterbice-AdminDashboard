<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'department_id',
        'gender',
        'date_of_birth',
        'roll',
        'blood_group',
        'religion',
        'email',
        'class',
        'section',
        'admission_id',
        'phone_number',
        'guardian_id',
        'upload',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function guardian()
    {
        return $this->belongsTo(Guardian::class); // علاقة الطالب مع ولي أمره
    }
}
