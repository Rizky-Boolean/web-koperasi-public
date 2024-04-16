<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class APIUserController extends Controller
{

    public function profile( $id )
    {
        $user = User::find($id);
        $result = [
            'status' => 200,
            'message' => 'Data berhasil ditemukan',
            'users' => [$user]
        ];
        return $result;
    }

    public function getUserViaBarcode( $buyerId )
    {
        $user = User::where( 'buyer_id', $buyerId )->first();
        $result = [
            'status' => 200,
            'message' => 'Data berhasil ditemukan',
            'users' => [$user]
        ];
        return $result;
    }

    public function changePassword(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'new_password' => 'required|min:8|max:255',
            'confirm_password' => 'same:new_password'
        ]);
        $errors = $validator->errors();
        $dataErrors = [
            'password' => $errors->first('password'),
            'new_password' => $errors->first('new_password'),
            'confirm_password' => $errors->first('confirm_password')
        ];
        if ($validator->fails()) :
            return [
                'status' => 302,
                'message' => 'Semua data harus benar!',
                'errors' => $dataErrors,
                'users' => []
            ];
        else:
            $user = User::firstWhere('id', $id);
            if( ! Hash::check($request->password, $user->password) ) :
                $dataErrors['password'] = 'old password is wrong';
                return [
                    'status' => 302,
                    'message' => 'Password lama salah!',
                    'errors' => $dataErrors,
                    'users' => []
                ];
            else:
                User::where('id', $user->id)->update(['password' => bcrypt( $request->new_password )]);
                return [
                    'status' => 200,
                    'message' => 'Password berhasil diubah.',
                    'users' => []
                ];
            endif;

        endif;
    }

    public function editProfile( Request $request, $id )
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'address' => 'required',
        ]);
        $errors = $validator->errors();
        $dataErrors = [
            'phone' => $errors->first('phone'),
            'address' => $errors->first('address'),
        ];

        if ($validator->fails()) :
            return [
                'status' => 302,
                'message' => 'Semua data harus benar!',
                'errors' => $dataErrors,
                'users' => []
            ];
        else:

            User::where('id', $id)->update([
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            return [
                'status' => 200,
                'message' => 'Informasi profil berhasil diubah.',
                'users' => []
            ];

        endif;
    }


}
