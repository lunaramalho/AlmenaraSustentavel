<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PontoColeta; // Isso avisa que vamos usar o nosso Model

class PontoColetaController extends Controller
{
    // Criamos uma função chamada 'index' para listar tudo
    public function index()
    {
        // Vai no banco e puxa todos os bairros
        $pontos = PontoColeta::all();

        // Devolve os dados empacotados como JSON para o Front-end
        return response()->json($pontos);
    }
}