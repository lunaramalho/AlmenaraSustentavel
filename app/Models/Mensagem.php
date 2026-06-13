<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    use HasFactory;

    // Essa linha avisa ao Laravel que é seguro salvar esses três campos
    protected $fillable = ['nome', 'email', 'mensagem'];
}