<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        return view('layouts.login', [
            'title' => 'Login - Koperasi MINDA'
        ]);
    }

    public function login( Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'payer_id' => ['required'],
            'password' => ['required'],
        ]);

        $credentials['user_category'] = 'administrator';

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/admin');
        }

        return back()->with('error', 'ID atau Password anda salah!');
    }

    public function logout( Request $request ) : RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }



}
