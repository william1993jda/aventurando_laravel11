<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
//        validando formulario
        $request->validate(
//            Rules
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16'
            ],
//           Error Message
            [
                'text_username.required' => 'O username é obrigatório',
                'text_username.email'    => 'O username deve ser um e-mail válido',
                'text_password.required' => 'A senha é obrigatório',
                'text_password.min'      => 'A senha deve ter pelo menos :min caracteres',
                'text_password.max'      => 'A senha deve ter no máximo :max caracteres',
            ]
        );

        $username = $request->input('text_username');
        $password = $request->input('text_password');

//        Check if user exists
        $user = User::where('username', $username)
                        ->where('deleted_at', null)
                        ->first();

        if ($user) {
            // Usuário existe
            echo "Usuário encontrado!";
        } else {
            // Usuário não existe
            echo "Usuário não encontrado!";
        }
//        print_r($user);
    }

    public function logout()
    {
        return view('logout');
    }
}
