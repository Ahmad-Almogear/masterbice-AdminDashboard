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
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); // الاسم الأول
            $table->string('last_name'); // الاسم الأخير
            $table->string('relationship'); // العلاقة (والد، والدة، وصي)
            $table->string('email')->nullable(); // البريد الإلكتروني
            $table->string('phone_number'); // رقم الهاتف
            $table->string('address')->nullable(); // العنوان
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};
