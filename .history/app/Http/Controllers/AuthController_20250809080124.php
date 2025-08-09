<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. validação de credenciais
        $credentials = $request->validate([
            'email'     =>  'required|email',
            'password'  =>  'required',
        ]);

        // 2. Tenta autenticar o usuário
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // 3. gera um token para o usuário
            $token = $user->createToken('authToken')->plainTextToken;

            // 4. Retorna o token e os dados do usuário
            return response()->json([
                'user'  => $user,
                'token' => $token,
            ]);
        }

        // 5. Se a autenticação falhar, retorna um erro 401
    }
}
