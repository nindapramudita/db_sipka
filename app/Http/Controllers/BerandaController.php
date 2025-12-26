<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Laporan;

class BerandaController extends Controller
{
    public function berandaBackend()
    {
        return view('backend.v_beranda.index', [
            'judul' => 'Dashboard Admin',
            'total_user' => User::count(),
            'total_laporan' => Laporan::count(),
            'laporan_baru' => Laporan::where('status', 'Baru')->count(),
            'laporan_selesai' => Laporan::where('status', 'Selesai')->count()
        ]);
    }
}