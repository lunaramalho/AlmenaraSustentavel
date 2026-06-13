<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PontoColeta extends Model
{
    use HasFactory;

    protected $table = 'pontos_coleta';

    // Se isso não estiver salvo, o Laravel ignora os dados no Tinker!
    protected $fillable = [
        'bairro',
        'dias_semana',
        'horario'
    ];
}