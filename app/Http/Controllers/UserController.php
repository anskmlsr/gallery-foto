<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function getdataprofile(Request $request)
    {
        $data = auth()->user();
        return response()->json([
            'data'      => $data
        ], 200);
    }

    public function getdata(Request $request){
        $explore = Foto::with(['likes'])->withCount(['likes','komentars'])->where('id_user', auth()->id())->paginate(4);
        return response()->json([
            'datapost' =>$explore,
            'statuscode' => 200,
            'id' => auth()->user()->id
        ]);
    }

    public function ubahPassword(Request $request){
        $pesan = [
            'password_lama.required' => 'Password lama harus diisi',
            'password_baru.required' => 'Password baru harus diisi',
            'password_baru.min' => 'Password minimal 8 karakter',
            'confirm_password.required' => 'Konfirmasi password yang harus di isi',
            'confirm_password.same' => 'Konfirmasi password harus sama dengan password baru'
        ];

        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8',
            'confirm_password' => 'required|same:password_baru'
        ],$pesan);

        $user = auth()->user();

        if (!Hash::check($request->password_lama, $user->password)){
            return redirect()->back()->with('error', 'Password lama salah');
        } else {
            $user->update([
                'password' => Hash::make($request->password_baru)
            ]);
            return redirect()->back()->with('success', 'Password berhasil di ubah');
        }
    }

}

