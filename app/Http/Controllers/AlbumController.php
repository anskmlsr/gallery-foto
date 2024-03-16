<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function tampilalbum() {
        $album = album::where('id_user', Auth::user()->id)->get();
        return view('page.pin', compact('album'));
    }
    public function index() {
        $albums = album::where('id_user', Auth::user()->id)->get();
        return view('page.album', compact('albums'));
    }
    public function storeAlbum(Request $request){
        $request->validate([
            'nama_album'  => 'required',
            'deskripsi'  => 'required'
        ]);

        $fotoFile = $request->file('foto');
        $fotoExtention = $fotoFile->getClientOriginalExtension();
        $fotoName   = date('dmyhis').'.'.$fotoExtention;
        $fotoFile->move(public_path('/asset'), $fotoName);

        $dataAlbum = [
            'nama_album'  =>$request->nama_album,
            'foto'        => $fotoName,
            'deskripsi'   => $request->deskripsi, 
            'id_user'    => Auth::user()->id
           
        ];

        
        Album::create($dataAlbum);
        return redirect()->back()->with('success', 'Album Berhasil Di Buat');
    }
    public function detail($id){
        $fotos = Foto::where('id_user', $id)->get();
        $album = Album::where('id', $id)->first();
        // $albumFoto = Foto::where('id_user', auth()->user()->id)->get();
        $albumFoto = Foto::where('id_album', $id)->get();

        return view('page.detailalbum', compact('fotos', 'album','albumFoto'));
    }
}