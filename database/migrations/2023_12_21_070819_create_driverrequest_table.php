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
        Schema::create('driverrequest', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->string('district');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driverrequest');
    }
};
