<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $fillable = [
        'nama',
        'lokasi',
        'jenis_kekerasan',
        'deskripsi_singkat',
        'upload_bukti',
        'status_laporan'
    ];
}

