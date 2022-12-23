<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields[' name '],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])

        ]);
        $token = $user->createToken($request->nameToken)->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }
    public function login(Request $request)
    {
        $fields = $request->validate(
            [
                'email' => 'required|string',
                'password' => 'required|string'

            ]
        );
        $user = User::where('email', $fields['email']->first());
        // Se não tiver nenhum usuario com esse email ela vai retornar essa mensagem
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'E-mail ou Senha invalidos'
            ], 401);
        }
        $token = $user->createToken('UsuarioLogado')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }
}