<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FotoController extends Controller
{
    public function editfoto(Request $request, $id){
    $user = auth()->user();
    $album = Album::where('id_user', Auth::user()->id)->get();
    $foto = Foto::find($id);
    return view('page.edit-postingan', compact('user', 'album', 'foto'));
    }

    public function editpostingan(Requuest $request, $id){
        $foto = Foto::find($id);

        $foto->judul_foto   = $request->judul_baru;
        $foto->deskripsi_foto = $request->deskripsi_baru;
        $foto->id_album       = $request->album;

        $foto->save();

        return redirect()->back()->with('success', 'Postingan berhasil diperbarui');
    }

    public function hapuspostingan($id){
        $foto = Foto::find($id);
        $foto->delete();

        return redirect()->back()->with('success', 'Postingan berhasil di hapus');
    }
}
