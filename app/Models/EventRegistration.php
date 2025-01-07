<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    use HasFactory;

    // تحديد الأعمدة القابلة للتعبئة (fillable)
    protected $fillable = [
        'name',
        'phone',
        'children_count',
        'child_name',
        'event_id',  // في حال كنت تريد ربط التسجيل مع فعالية معينة
    ];

    // إذا كان هناك علاقة بين هذا الموديل والفعالية، يمكنك إضافتها هنا
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
