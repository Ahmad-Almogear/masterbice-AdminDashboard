<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Teacher;






class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_id',
        'department_name',
        'head_of_department',
        'department_start_date',
        'no_of_students',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function teachers()
    {
    return $this->belongsToMany(Teacher::class, 'department_teacher');
    }


    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $getUser = self::orderBy('department_id', 'desc')->first();

            if ($getUser) {
                $latestID = intval(substr($getUser->department_id, 5));
                $nextID = $latestID + 1;
            } else {
                $nextID = 1;
            }
            $model->department_id = 'PRE_' . sprintf("%05s", $nextID);
            while (self::where('department_id', $model->department_id)->exists()) {
                $nextID++;
                $model->department_id = 'PRE_' . sprintf("%05s", $nextID);
            }
        });
    }
}
