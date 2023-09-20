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
        Schema::create('practice_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('practice_student_id')
                ->constrained('practice_students')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->longText('content')->nullable();
            $table->longText('note')->nullable();
            $table->date('start');
            $table->date('end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practice_plans');
    }
};
