<?php

use App\Models\User;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->text('token');
            $table->string('amount');
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(\App\Models\Course::class)->constrained();
            $table->integer('status')->nullable();
            $table->string('cardNumber')->nullable();
            $table->integer("transId")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
