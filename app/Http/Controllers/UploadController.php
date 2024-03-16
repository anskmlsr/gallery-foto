<?php

namespace App\Http\Controllers;

use App\Models\Foto;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function index(){
        $albums = Album::where('id_user', Auth::user()->id)->get();
        // $albums = album::all();
        return view('page.upload', compact('albums'));
    }
    public function storeFoto(Request $request){
        $request->validate([
            'url'               =>  'required',
            'judul_foto'        => 'required',
            'deskripsi_foto'    => 'required',
            'album'             => 'required',
        ]);

        $fotoFile = $request->file('url');
        $fotoExtention = $fotoFile->getClientOriginalExtension();
        $fotoName   = date('dmyhis').'.'.$fotoExtention;
        $fotoFile->move(public_path('/asset'), $fotoName);

        $dataFoto = [
            'url'               => $fotoName,
            'judul_foto'        => $request->judul_foto,
            'deskripsi_foto'    => $request->deskripsi_foto,
            'id_user'           => Auth::user()->id,
            'id_album'          => $request->album, 
        ];

        Foto::create($dataFoto);
        return redirect()->back()->with('success', 'Foto berhasil di upload');
    }
}