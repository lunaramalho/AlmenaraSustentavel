<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('depositos', function (Blueprint $table) {
        $table->id();
        $table->string('data');
        $table->string('material');
        $table->string('bairro');
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Isso liga o depósito ao dono
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depositos');
    }
};
