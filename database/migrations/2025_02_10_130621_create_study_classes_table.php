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
        Schema::create('study_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('homeroom_teacher')->references('id')->on('teachers')->cascadeOnDelete();
            $table->string('desk')->default('10');
            $table->string('fan')->nullable();
            $table->string('whiteboard')->nullable();
            $table->enum('status',[1,0])->default(1)->comment('1. Open | 0. Close');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_classes');
    }
};
