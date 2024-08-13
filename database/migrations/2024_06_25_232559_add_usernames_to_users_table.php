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
        Schema::table('users', function (Blueprint $table) {
            //
            // Verificar si la columna ya existe antes de agregarla
            if (!Schema::hasColumn('users', 'username')) {
                $table->string('username')->unique();
            }        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            
            // Verificar si la columna existe antes de intentar eliminarla
            if (Schema::hasColumn('users', 'username')) {
                $table->dropColumn('username');
            }        });
    }
};
