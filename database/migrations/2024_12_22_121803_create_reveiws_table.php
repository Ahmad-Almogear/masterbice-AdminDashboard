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
        Schema::create('reveiws', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // مفتاح أجنبي للمستخدم
        $table->text('review'); // النص الخاص بالمراجعة
        $table->integer('rating')->nullable(); // التقييم (اختياري)
        $table->morphs('reviewable'); // العلاقة polymorphic مع الكائنات القابلة للمراجعة
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reveiws');
    }
};
