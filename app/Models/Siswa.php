<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'id_lembaga',
        'nis',
        'nama',
        'email',
        'foto'
    ];

    public function lembaga()
    {
        return $this->belongsTo('App\Models\Lembaga', 'id_lembaga', 'id');
    }
}
