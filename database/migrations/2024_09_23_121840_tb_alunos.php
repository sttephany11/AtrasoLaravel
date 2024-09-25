<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbalunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('curso');
            $table->string('password', 255); // Coluna para a senha
            $table->string('rm'); // Adicionando coluna RM
            $table->string('periodo'); // Adicionando coluna Período
            $table->string('modulo'); // Adicionando coluna Módulo
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbalunos');
    }
};
