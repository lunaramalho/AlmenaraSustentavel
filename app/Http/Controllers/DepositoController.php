<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposito; // Certifique-se de ter criado esse Model
use Illuminate\Support\Facades\Auth;

class DepositoController extends Controller
{
    // Lista os depósitos do usuário logado
    public function index()
    {
        // Pega apenas os depósitos de quem está logado
        return response()->json(Auth::user()->depositos);
    }

    // Salva um novo depósito
    public function store(Request $request)
    {
        $dados = $request->validate([
            'data' => 'required|string',
            'material' => 'required|string',
            'bairro' => 'required|string',
        ]);

        // Cria o depósito vinculado ao usuário logado
        $deposito = Auth::user()->depositos()->create($dados);

        return response()->json([
            'sucesso' => true,
            'mensagem' => 'Depósito registrado!',
            'deposito' => $deposito
        ], 201);
    }

    // Versão para o site (sessão): grava o depósito e volta para o perfil
    public function salvarWeb(Request $request)
    {
        $dados = $request->validate([
            'data' => 'required|string',
            'material' => 'required|string',
            'bairro' => 'required|string',
        ]);

        Auth::user()->depositos()->create($dados);

        return back()->with('success_deposito', 'Depósito registrado com sucesso!');
    }
}