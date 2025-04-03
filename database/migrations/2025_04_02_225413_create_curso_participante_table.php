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
        Schema::create('curso_participante', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained()->onDelete('cascade'); // Clave foránea a la tabla cursos
            $table->foreignId('participante_id')->constrained()->onDelete('cascade'); // Clave foránea a la tabla participantes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curso_participante');
    }
};
