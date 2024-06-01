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
        Schema::create('agency_requests', function (Blueprint $table) {
            $table->id();
            $table->string('companyname')->unique();;
            $table->string('password');
            $table->string('district');
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
        Schema::dropIfExists('agency_requests');
    }
};
