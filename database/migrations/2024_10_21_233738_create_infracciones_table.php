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
        Schema::create('infracciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dni', 8);
            $table->date('fecha');
            $table->string('placa', 7);
            $table->string('infraccion', 200);
            $table->string('descripcion', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infracciones');
    }
};
