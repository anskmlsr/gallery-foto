<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;

class PinController extends Controller
{
    public function savepin(Request $request){
        $request->validate([
            'filefoto'  =>'required|mimes:png,jpg|max:1024',
            'judul'     => 'required',
            'deskripsi' => 'required',
        ]);

        $file_foto     = $request->file('filefoto');
        $ektensi_foto  = $file_foto->extension();
        $nama_foto     = 'GalleryKu-'.date('dmyhis').'.'.$ektensi_foto;
        $file_foto->move(public_path('/assets'), $nama_foto);
        
        $data_store = [
            'judul_foto'    => $request->input('judul'),
            'deskripsi_foto'=> $request->input('deskripsi'),
            'url'           => $nama_foto,
            'id_album'      => $request->input('id_album'),
            'id_user'       => auth()->user()->id
        ];
        Foto::create($data_store);
        return redirect()->back()->with('success', 'Data berhasil di simpan');
    }
}
