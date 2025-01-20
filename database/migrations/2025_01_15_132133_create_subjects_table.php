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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject_name'); //ឈ្មោះ មុខវិជ្ជា
            $table->enum('subject_type',[1,2,3])->default(3)->comment("1:Social | 2:Science | 3:General "); // ប្រភេទមុខវិជ្ជា
            $table->string('credit')->default(0); //ពិន្ទុសរុបសម្រាបមុខវិជ្ជា
            $table->string('grade')->default(0); //កំរិតថ្នាក់
            $table->string('book_number')->nullable();  //ចំនួនសៀវភៅសម្រាប់មុខវិជ្ជា
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
