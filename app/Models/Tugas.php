<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    // nama tabel (optional, tapi bagus ditulis)
    protected $table = 'tugas';

    // kolom yang boleh di-mass assign lewat create() / update()
    protected $fillable = [
        'nama',
        'tugas',
        'tgl_mulai',
        'tgl_selesai',
    ];
}
