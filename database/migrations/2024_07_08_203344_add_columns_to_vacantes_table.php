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
        Schema::table('vacantes', function (Blueprint $table) {
            $table->foreignId('salario_id')->constrained()->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('titulo');
            $table->string('empresa');
            $table->date('ultimo_dia');
            $table->text('descripcion');
            $table->string('imagen');
            $table->integer('publicado')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {

            // Primera forma

            /* $table->dropColumn('salario_id');
            $table->dropColumn('categoria_id');
            $table->dropColumn('user_id');
            $table->dropColumn('titulo');
            $table->dropColumn('empresa');
            $table->dropColumn('ultimo_dia');
            $table->dropColumn('descripcion');
            $table->dropColumn('imagen');
            $table->dropColumn('publicado'); */

            // Segunda forma
            $table->dropColumn(['salario_id', 'categoria_id', 'user_id', 'titulo', 'titulo', 'empresa', 'ultimo_dia', 'descripcion', 'imagen', 'publicado']);
        });
    }
};