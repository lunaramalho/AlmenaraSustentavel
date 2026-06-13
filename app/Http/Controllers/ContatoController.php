<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensagem; 

class ContatoController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'nome' => 'required',
        'email' => 'required|email',
        'mensagem' => 'required',
    ]);

    Mensagem::create($request->only(['nome', 'email', 'mensagem']));

    return back()->with('success', 'Mensagem enviada com sucesso!');
}
}