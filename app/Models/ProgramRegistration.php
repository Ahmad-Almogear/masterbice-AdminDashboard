<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProgramRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'children_count',
        'child_name',
        'program_id',  // في حال كنت تريد ربط التسجيل مع فعالية معينة
    ];

    // إذا كان هناك علاقة بين هذا الموديل والفعالية، يمكنك إضافتها هنا
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
