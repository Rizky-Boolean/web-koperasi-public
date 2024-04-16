<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.profile.index', [
            'title' => 'Profile - Koperasi MINDA'
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('layouts.profile.edit', [
            'title' => 'Edit Profile - Koperasi MINDA'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user)
    {

        $rules = [
            'phone' => 'required',
            'address' => 'required',
            'buyer_photo' => 'image|file|max:2500'
        ];

        if( $request->phone != auth()->user()->phone ) :
            $rules['phone'] = 'required|min:12|max:13|unique:users,phone';
        endif;

        $validated = $request->validate($rules);

        if( $request->file('buyer_photo') != null ) :
            if( auth()->user()->buyer_photo != 'uploads/images/profile-photos/avatar.jpg' ) :
                Storage::delete(auth()->user()->buyer_photo);
            endif;
            $validated['buyer_photo'] = $request->file('buyer_photo')->store('uploads/images/profile-photos');
        else :
            $validated['buyer_photo'] = auth()->user()->buyer_photo;
        endif;




        User::find($user)->update($validated);

        return redirect('/admin/profile')->with('success', 'Profile Admin berhasil diubah');
    }

    public function action_change_password(Request $request)
    {
        $rules = [
            'old_password' => 'required',
            'new_password' => 'required|min:8|max:255',
            'repeat_password' => 'same:new_password'
        ];

        $validated = $request->validate($rules);

        $user = User::firstWhere('id', auth()->user()->id);

        if( !password_verify($validated['old_password'], $user->password) ) :
            return redirect('/admin/change-password')->with('failed', 'Password lama salah!');
        endif;
        if( $validated['old_password'] === $validated['new_password'] ) :
            return redirect('/admin/change-password')->with('failed', 'Password baru harus beda dengan password lama.');
        endif;

        User::where('id', auth()->user()->id)->update([
            'password' => bcrypt($validated['new_password'])
        ]);
        return redirect('/admin/profile')->with('success', 'Password berhasil diubah.');
    }

}
