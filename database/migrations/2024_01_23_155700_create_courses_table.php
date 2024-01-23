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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->enum('status' , ['active' , 'pending' , 'inactive']);
            $table->text('description')->default('');
            $table->enum('isCompleted' , ['soon', 'completed', 'completing']);
            $table->integer('price')->default('0');
            $table->integer('rate')->nullable()->default(0)->unsigned()->check("rate <= 5");
            $table->integer('like')->default(0);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('image');
            $table->string('introduction');
            $table->integer('total_sales')->default(0);
            $table->integer('time')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
