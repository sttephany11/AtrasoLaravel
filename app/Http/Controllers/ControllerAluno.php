<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alunos;

class ControllerAluno extends Controller
{
    public function storeApi(Request $request)
    {
         // Validando o request
         $validatedData = $request->validate([
            'nome' => 'required|string',
            'curso' => 'required|string',
            'password' => 'required|string',
            'rm' => 'required|string',
            'periodo' => 'required|string',
            'modulo' => 'required|string',
            
        ]);

        //Verifica se o usuario existe
        $existingUser = Alunos::where('rm', $validatedData['rm'])->first();

        if ($existingUser) {
            return response()->json([
                'status' => 'Falha',
                'message' => 'Usuário já cadastrado com este e-mail.'
            ], 409); // 409 Conflict
        }

        // Criptografando a senha
        $validatedData['password'] = bcrypt($validatedData['password']);



        // Criando um novo Contratante com os dados validados
        $alunos = Alunos::create($validatedData);

        // Retornando resposta de sucesso com os detalhes do Contratante criado
        return response()->json([
            'status' => 'Fazz o LLLLLL',
              'alert' => 'Cadastro realizado com sucesso!',
            'data' => $alunos
        ], 201); // 201 Created
    }




    public function auth(Request $request)
    {
        $validador = [
            'rm' => 'required|string',
            'password' => 'required|string',
        ];

        $validacao = Validator::make($request->all(), $validador);

        if ($validacao->fails()) {
            return response()->json([
                'status' => 'Falha',
                'message' => $validacao->errors()->all(),

            ]);
        }

        $credenciais = [
            'rm' => $request->input('rm'),
            'password' => $request->input('password'),
        ];

        if (!Auth::guard('alunos')->attempt($credenciais)) {
            return response()->json([
                'status' => 'Falha',
                'message' => 'Login incorreto, tente novamente',
            ]);
        }

        $user = Auth::guard('alunos')->user();
        // $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'Sucesso',
            'message' => 'Seja bem-vindo', $user->nome,
            // 'token' => $token,
        ]);
    }
}
