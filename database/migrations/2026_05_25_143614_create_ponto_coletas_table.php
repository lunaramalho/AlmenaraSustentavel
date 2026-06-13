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
    // Criando a tabela com o nome correto em português
    Schema::create('pontos_coleta', function (Blueprint $table) {
        $table->id();
        $table->string('bairro');       // Armazena o nome do bairro (ex: Cidade Jardim)
        $table->string('dias_semana');  // Armazena o dia da coleta (ex: Segunda-feira)
        $table->string('horario');      // Armazena o horário (ex: 09h)
        $table->timestamps();           // Cria as colunas automáticas de data do Laravel
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ponto_coleta');
    }
};
