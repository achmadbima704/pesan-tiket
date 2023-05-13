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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignId('departure')->constrained()
                ->cascadeOnUpdate();
            $table->foreignId('arrival')->constrained()
                ->cascadeOnUpdate();
            $table->time('departure_time');
            $table->time('arrival_time');
            $table->double('price');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
