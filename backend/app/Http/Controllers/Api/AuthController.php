<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credenciais = $request->all(['email', 'password']);
        $token = auth('api')->attempt($credenciais);

        if ($token) {
            return response()->json(['token' => $token]);
        } else {
            return response()->json(['erro' => 'usuario ou senha invalido', 'code' => 403]);
        }
        //401 -> não autorizado
        //403 -> proibido (login ou senha invalido)
        return 'login';
    }

    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'Sucesso ao realizar logout']);
    }

    // renova o token
    public function refresh()
    {
        /** @var Illuminate\Auth\AuthManager */

        $auth = auth('api');
        $token = $auth->refresh(); // cliente encaminhe um jwt valido
        return response()->json(['token' => $token]);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }
}
