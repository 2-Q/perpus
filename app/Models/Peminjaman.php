<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $primaryKey = 'no';

    protected $fillable = [
        'no',
        'nrp_mahasiswa',
        'kode_buku',
        'tgl_pinjam',
        'tgl_kembali'
    ];
}
