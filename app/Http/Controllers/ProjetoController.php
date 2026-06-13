<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projeto;

class ProjetoController extends Controller
{
    public function create()
    {
        // Retorna a view (o HTML) do formulário de criação
        return view('projetos.criar');
    }

    public function store(Request $request)
    {
        // Valida os dados antes de salvar
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required',
        ]);

        // Cria o registro no banco
        Projeto::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('projetos.criar')->with('success', 'Projeto cadastrado!');
    }
}
