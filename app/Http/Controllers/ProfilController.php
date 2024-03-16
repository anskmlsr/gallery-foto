<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function getdataprofile(Request $request)
    {
        $data = auth()->user();
        return response()->json([
            'data'      => $data
        ], 200);
    }

    public function getdata(Request $request){
        $user = auth()->id();
        $explore = Foto::with(['likefotos', 'comments'])->withCount(['likefotos','comments'])->where('id_user', $user)->paginate(4);
        return response()->json([
            'datapost' =>$explore,
            'statuscode' => 200,
            'id' => auth()->user()->id
        ]);
    }
    public function update(Request $request) {
        $user = auth()->user();
        if ($request->hasfile('avatar')) {
        $avatar = $request->file('avatar');
        $extensi = $avatar->getClientOriginalExtension();
        $filename = 'users' . now()->timestamp .'.'. $extensi;
        $avatar->move('assets', $filename);
        $user->url = $filename;
        } else {
         $avatar = $user->avatar;
        }
        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
 
        $user->save();
 
        return redirect()->back()->with('success', 'Profil Berhasil Di Perbaharui');
     }

     public function album(Request $request){
        $tampilalbum = Album::with('foto')->where('id_user', auth()->user()->id)->get();
        return view('page.album', compact('tampilalbum'));
     }

     public function show($id){
        $user = auth()->user();
        $fotos = Foto::where('id_album', $id)->orderBy('id', 'DESC')->where('id_user', Auth::user()->id)->get();
        $album = Album::with('foto')->findOrFail($id);
        return view('page.detailalbum',compact('album', 'fotos', 'user'));
     }

    public function ubahpassword(Request $request){
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
