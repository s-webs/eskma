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
        Schema::create('practice_students', function (Blueprint $table) {
            $table->id();

            $table->foreignId('practice_id')->constrained('practices')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('student_id')->constrained('students')->onUpdate('cascade')->onDelete('cascade');

            $table->longText('student_review')->nullable();
            $table->longText('base_user_review')->nullable();
            $table->longText('teacher_review')->nullable();

            $table->integer('base_user_grade')->default(0);
            $table->integer('teacher_grade')->default(0);
            $table->integer('total_grade')->default(0);

            $table->boolean('base_user_signature')->default(0);
            $table->boolean('teacher_signature')->default(0);
            $table->boolean('student_signature')->default(0);
            $table->boolean('head_of_department_signature')->default(0);

            $table->string('pdf_link')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practice_students');
    }
};
