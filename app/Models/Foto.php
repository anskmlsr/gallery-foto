<?php

namespace App\Models;

use App\Models\User;
use App\Models\Album;
use App\Models\Komentar;
use App\Models\Likefoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foto extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul_foto',
        'deskripsi_foto',
        'url',
        'id_album',
        'id_user'
    ];

    protected $table ='fotos';

    //Relasi nilai balik ke tabel user
    public function user(){
        return $this->belongsto(User::class, 'id_user', 'id');
    }

    //Relasi ke tabel likefotos
    public function likefotos(){
        return $this->hasMany(Likefoto::class, 'id_foto', 'id');
    }

     //Relasi ke dalam tabel comment
    public function comments(){
        return $this->hasMany(Komentar::class, 'id_foto', 'id');
    }

    //Relasi antar foto ke album 
    public function albums(){
        return $this->hasMany(Album::class, 'id_user', 'id');
    }
}
