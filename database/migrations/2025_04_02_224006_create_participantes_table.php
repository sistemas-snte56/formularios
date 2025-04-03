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
        Schema::create('participantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained()->onDelete('cascade');
            $table->string('rfc')->unique(); // RFC único
            $table->string('nombre');
            $table->string('apaterno');
            $table->string('amaterno');
            $table->enum('genero', ['Hombre', 'Mujer']); // Género puede ser 'M' para masculino o 'F' para femenino
            $table->string('email')->unique(); // Correo electrónico único
            $table->string('telefono')->nullable(); // Teléfono (puede ser nulo)
            $table->string('ct')->nullable(); // CT (puede ser nulo)
            $table->string('cargo'); // Cargo
            $table->string('nivel'); // Nivel
            $table->string('curp')->nullable(); // CURP único
            $table->string('folio', 250)->nullable(); // Folio único                  
            $table->string('slug')->unique();            
            $table->string('codigo_id', 250)->nullable();
            $table->string('codigo_qr')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participantes');
    }
};
