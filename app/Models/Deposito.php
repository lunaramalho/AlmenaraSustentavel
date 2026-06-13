<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    // Permite que o Laravel salve essas colunas automaticamente
    protected $fillable = ['data', 'material', 'bairro', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
