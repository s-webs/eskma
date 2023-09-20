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
        Schema::create('practice_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('practice_student_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->longText('content');
            $table->date('start');
            $table->date('end');
            $table->uuid('uuid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practice_contents');
    }
};
