<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('adress'); // ربط بالمريض في جدول users
            $table->date('date_of_birth')->nullable(); // تاريخ الميلاد
            $table->enum('gender', ['male', 'female'])->nullable(); // الجنس
            $table->enum('status', ['treated', 'under_treatment',])->default('under_treatment'); // حالة المريض
     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
