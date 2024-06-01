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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
             $table->foreignId('driver_id')->constrained('drivers');
            $table->string('tittle');
            $table->string('fromcity');
            $table->string('tocity');
             $table->time('atime');
            $table->time('dtime');
            $table->text('detail');
            $table->text('status');
            $table->string('eimage');
            $table->timestamps();
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
