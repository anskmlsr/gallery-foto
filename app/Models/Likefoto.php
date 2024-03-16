<?php

namespace App\Models;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Likefoto extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_foto',
    ];
    protected $table = 'likefotos';

    // relasi nilai balik
    public function fotos(){
        return $this->belongsTo(Foto::class, 'id_foto', 'id');
    }

    public function user(){
        return $this->belongsTo(User::clas,'id_user', 'id');
    }
}
