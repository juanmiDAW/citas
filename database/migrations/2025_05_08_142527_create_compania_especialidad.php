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
        Schema::create('compania_especialidad', function (Blueprint $table) {
            $table->id();
            $table->foreignId('compania_id')->constrained('companias');
            $table->foreignId('especialidad_id')->constrained('especialidades');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compania_especialidad');
    }
};
