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
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->constrained()->onDelete('cascade'); // Adds foreign key constraint
            $table->string('name');
            $table->string('model');
            $table->string('number');
            $table->string('startpoint');
            $table->string('endpoint');
            $table->decimal('fare', 8, 2);
            $table->string('status')->default('inactive');
            $table->string('ride_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rides');
    }
};
