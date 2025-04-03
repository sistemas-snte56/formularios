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
        Schema::table('participantes', function (Blueprint $table) {
            $table->dropForeign(['curso_id']); // Eliminar la clave foránea
            $table->dropColumn('curso_id');    // Eliminar la columna curso_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('participantes', function (Blueprint $table) {
            $table->foreignId('curso_id')->constrained()->onDelete('cascade');
        });
    }
};
