<?php

namespace App\Http\Controllers;

use App\Models\Foto;

use App\Models\Komentar;
use App\Models\Likefoto;
use Illuminate\Http\Request;


class ExploreController extends Controller
{
    public function getdata(Request $request){
        if($request->cari !== 'null'){
            $explore = Foto::with(['likefotos'])->withCount(['likefotos', 'comments'])->where('judul_foto', 'like','%'.$request->cari.'%')->orderBy('id', 'desc')->paginate(4);
        } else {
        $explore = Foto::with(['likefotos'])->withCount(['likefotos', 'comments'])->orderBy('id', 'desc')->paginate(4);
        }
        return response()->json([
            'data'  =>$explore,
            'statuscode' =>200,
            'idUser'     => auth()->user()->id
        ]);
    }

    public function likefotos(Request $request){
        try{
            $request->validate([
                'idfoto' => 'required'
            ]);
            $existingLike = Likefoto::where('id_foto', $request->idfoto)->where('id_user', auth()->user()->id)->first();
            if(!$existingLike){
                $dataSimpan = [
                'id_foto'   => $request->idfoto,
                'id_user'   => auth()->user()->id
                ];
                Likefoto::create($dataSimpan); 
            } else {
                Likefoto::where('id_foto', $request->idfoto)->where('id_user', auth()->user()->id)->delete();
            }
            
            return response()->json('Data berhasil disimpan',200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
     
    }

    public function getdatadetail(Request $request, $id){
        $dataDetailFoto   = Foto::with('user')->where('id', $id)->firstOrfail();
        return response()->json([
            'dataDetailFoto'   => $dataDetailFoto
        ], 200,);
    }

    public function ambildatakomentar(Request $request, $id){
        $ambilkomentar = Komentar::with('user')->where('id_foto', $id)->get();
        return response()->json([
            'data'  =>$ambilkomentar
        ],200);
    }

    public function kirimkomentar(Request $request){
        try {
            $request->validate([
                'idfoto'   => 'required',
                'isi_komentar' =>'required'
            ]);
            $dataStoreKomentar = [
                'id_user'      => auth()->user()->id,
                'id_foto'      => $request->idfoto,
                'isi_komentar' => $request->isi_komentar
            ];
           Komentar::create($dataStoreKomentar);
            return response()->json([
                'data'   => 'Data berhasil di simpan'

            ], 200);
        } catch (\Throwable $th) {
            return response()->json('Data komentar gagal di simpan', 500);
        }
    }
}



