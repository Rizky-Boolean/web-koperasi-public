<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class APIAuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('payer_id', 'password');

        if (Auth::attempt($credentials)) {
            // Jika user berhasil login
            $user = Auth::user();

            if ($user->user_category != 'administrator') {
                return [
                    'status' => 200,
                    'message' => 'Login berhasil.',
                    'users' => [$user]
                ];
            } else {
                return [
                    'status' => 302,
                    'message' => 'Login gagal!',
                    'users' => []
                ];
            }
        } else {
            return [
                'status' => 302,
                'message' => 'Login gagal!',
                'users' => []
            ];
        }
    }

}
