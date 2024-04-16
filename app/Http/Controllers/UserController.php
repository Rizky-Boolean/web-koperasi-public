<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.users.index', [
            'title' => 'Pengguna - Koperasi MINDA',
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.users.create', [
            'title' => 'Tambah Pengguna - Koperasi MINDA'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'buyer_name' => 'required',
            'payer_name' => 'required',
            'buyer_id' => 'required',
            'payer_id' => 'required',
            'gender_buyer' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'user_category' => 'required',
            'role' => 'required',
        ]);

        $validated['password'] = bcrypt($validated['payer_id']);

        User::create($validated);

        return redirect('/admin/users')->with('success', 'Data user berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('layouts.users.show', [
            'title' => 'Detail Data Pengguna - Koperasi MINDA',
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('layouts.users.edit', [
            'title' => 'Edit Data Pengguna - Koperasi MINDA',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'buyer_name' => 'required',
            'payer_name' => 'required',
            'buyer_id' => 'required',
            'payer_id' => 'required',
            'gender_buyer' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'user_category' => 'required',
            'role' => 'required',
        ]);

        $validated['password'] = bcrypt($validated['payer_id']);

        User::find($user->id)->update($validated);

        return redirect('/admin/users')->with('success', 'Data user berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::find($user->id)->delete();

        return redirect('/admin/users')->with('success', 'Data user berhasil dihapus');
    }

    public function reset_password(User $user)
    {

        $validated['password'] = bcrypt($user->payer_id);

        User::find($user->id)->update($validated);

        return redirect('/admin/users/' . $user->id)->with('success', 'Password berhasil direset.');

    }

    public function print()
    {
        return view('layouts.users.print', [
            'title' => 'Daftar ID Card - Koperasi MINDA',
            'users' => User::where('user_category', '!=', 'administrator')->get()
        ]);
    }

    public function print_single(User $user)
    {
        return view('layouts.users.print-single', [
            'title' => 'ID Card ' . $user->buyer_name . ' - Koperasi MINDA',
            'user' => $user
        ]);
    }

}
