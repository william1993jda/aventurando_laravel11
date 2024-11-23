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
            ->where('deleted_at', NULL)
            ->first();

        if (!$user || !password_verify($password, $user->password)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('loginError', 'E-mail ou senha incorretos.');
        }

//        Update last login
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

//        login user
        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username
            ]
        ]);

        return redirect()->to('/');
    }


    public function logout()
    {
//        Logout from the application
        session()->forget('user');
        return redirect()->to('/login');
    }
}
