<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Método para Cadastrar um novo usuário
    public function cadastrar(Request $request)
    {
        // Validação dos dados que chegam do Front-end (baseado nos "names" do seu HTML)
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'senha' => 'required|string|min:6',
            'telefone' => 'nullable|string',
            'endereco' => 'nullable|string',
            'bairro' => 'nullable|string',
        ]);

        // Criação do usuário no banco de dados
        $user = User::create([
            'name' => $request->nome, // O banco espera 'name', o formulário envia 'nome'
            'email' => $request->email,
            'password' => Hash::make($request->senha), // Criptografando a senha por segurança
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'bairro' => $request->bairro,
        ]);

        return response()->json([
            'mensagem' => 'Usuário cadastrado com sucesso!',
            'usuario' => $user
        ], 201);
    }

    // Método para Fazer Login
 public function login(Request $requisicao)
    {
        // 1. Valida esperando 'senha', que é exatamente a palavra que a sua tela visual envia
        $requisicao->validate([
            'email' => 'required|email',
            'senha' => 'required' 
        ]);

        // 2. Associa a 'senha' com 'password' (que é o nome obrigatório da coluna no banco de dados)
        $credenciais = [
            'email' => $requisicao->email,
            'password' => $requisicao->senha
        ];

        // 3. Tenta entrar no sistema com as informações ajustadas
        if (Auth::attempt($credenciais)) {
            $usuarioLogado = Auth::user(); 
            
            // 4. Cria a chave de acesso segura
            $chaveDeAcesso = $usuarioLogado->createToken('chave_acesso')->plainTextToken;
            
            return response()->json([
                'mensagem' => 'Login realizado com sucesso!',
                'usuario' => $usuarioLogado,
                'token' => $chaveDeAcesso // 5. Devolve a chave para a tela poder salvar
            ], 200);
        }

        // Se der erro:
        return response()->json([
            'mensagem' => 'E-mail ou senha incorretos.'
        ], 401);
    }
}