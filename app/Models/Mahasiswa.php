<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'nrp';

    protected $fillable = [
        'nrp',
        'nama',
        'prodi',
        'angkatan',
        'kelas'
    ];
}
