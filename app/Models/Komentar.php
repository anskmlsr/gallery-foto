<?php

namespace App\Models;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komentar extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_foto',
        'isi_komentar'
    ];
    protected $table = 'comments';

    // relasi nilai balik
    public function fotos(){
        return $this->belongsTo(Foto::class, 'id_foto', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class,'id_user','id');
    }
}
