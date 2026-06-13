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
            $table->string('foto_perfil')->nullable(); // Campo para o caminho da imagem
            $table->text('bio')->nullable(); // Campo para a mini-bio
            
            // Novos campos baseados no formulário de cadastro
            $table->string('telefone')->nullable();
            $table->string('endereco')->nullable();
            $table->string('bairro')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Removemos todos os campos caso seja necessário reverter a migration
            $table->dropColumn([
                'foto_perfil', 
                'bio', 
                'telefone', 
                'endereco', 
                'bairro'
            ]);
        });
    }
};
