<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students', 'id')->onDelete('cascade'); // ارتباط مع جدول الطلاب
            $table->foreignId('teacher_user_id')->constrained('teachers', 'id')->onDelete('cascade'); // ارتباط مع جدول المعلمين
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade'); // ارتباط مع جدول المواد
            $table->integer('grade'); // درجة الطالب
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
