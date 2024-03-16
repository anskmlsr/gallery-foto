<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AuthController;

class AuthController extends Controller
{
    public function register(Request $request) {
        return view('register');
    }

    public function registered(Request $request){
        $request->validate([
            'email'    =>'required|unique:users,email',
            'password' =>'required|min:8',
            'tgl_lahir'=>'required'
        ]);
        $file_foto     = $request->file('filefoto');
        $ektensi_foto  = $file_foto->extension();
        $nama_foto     = 'GalleryKu-'.date('dmyhis').'.'.$ektensi_foto;
        $file_foto->move(public_path('/assets'), $nama_foto);

        $dataStore = [
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'tgl_lahir'=> $request->tgl_lahir,
            'url' => $nama_foto,
        ];
        User::create($dataStore);
        return redirect('/login')->with('success', 'Data berhasil di simpan');
    }

    public function auth(Request $request){
        $request->validate([
            'email'    =>'required',
            'password' =>'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $request->session()->regenerate();

            
            return redirect('/explore');
        } else{
            return('gagal');
        }
        
    }

    public function ubahprofil (Request $request){
        $user = auth()->user();


        $file_foto     = $request->file('avatar');
        $ektensi_foto  = $file_foto->extension();
        $nama_foto     = 'GalleryKu-'.date('dmyhis').'.'.$ektensi_foto;
        $file_foto->move(public_path('/assets'), $nama_foto);


        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->url = $nama_foto;
        $user->save();
        return redirect()->back()->with('success', 'Data perubahan tersimpan');
    }

    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }

}


