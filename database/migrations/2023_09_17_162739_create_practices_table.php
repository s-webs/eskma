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
        Schema::create('practices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('teachers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('practice_base_users_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('title'); // Название практики
            $table->integer('duration'); // Количество часов
            $table->foreignId('academic_year_id')->constrained('academic_years')->onUpdate('cascade')->onDelete('cascade'); // Годы обучения
            $table->string('language'); // Язык
            $table->date('start'); // Начало практики
            $table->date('end'); // Конец практики
            $table->uuid('uuid')->default(\Illuminate\Support\Str::uuid())->unique();;
            $table->boolean('status')->default(1); // Статус практики
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practices');
    }
};
