<?php

namespace App\Models;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_album',
        'id_user',
        'id_album',
        'foto',
        'deskripsi'
    ];
    protected $table = 'albums';

    public function user(){
        return $this->belongsto(User::class, 'id_user', 'id');
    }

    public function fotos(){
        return $this->belongsTo(Foto::class, 'id_foto', 'id');
    }
}
