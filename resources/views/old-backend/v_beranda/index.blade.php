@extends('backend.v_layouts.app')

@section('content')

<div class="container-fluid py-4">

    <h3 class="text-dark font-weight-bolder mb-3">
        Selamat Datang, {{ Auth::user()->nama }} 👋
    </h3>

    <p class="text-secondary mb-4">
        Ini adalah halaman utama SIPKA (Sistem Informasi Pelaporan Kekerasan Anak).  
        Anda login sebagai 
        <b>
            @if(Auth::user()->role == 0)
                Admin
            @else
                Pelapor
            @endif
        </b>.
    </p>

    <!-- Banner -->
    <div class="card shadow border-radius-xl mb-4" style="overflow:hidden;">
        <img src="{{ asset('image/banner.jpg') }}"
             alt="Banner"
             style="width:100%; height:250px; object-fit:cover; border-radius:15px;">
    </div>

    <!-- Statistik -->
    <div class="row">

        <!-- Total laporan -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-radius-xl p-3">
                <h6 class="text-uppercase text-secondary">Total Laporan</h6>
                <h1 class="text-primary">
                    {{ $total_laporan ?? 0 }}
                </h1>
            </div>
        </div>

        <!-- Laporan Baru -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-radius-xl p-3">
                <h6 class="text-uppercase text-secondary">Laporan Baru</h6>
                <h1 class="text-warning">
                    {{ $laporan_baru ?? 0 }}
                </h1>
            </div>
        </div>

        <!-- Laporan Selesai -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-radius-xl p-3">
                <h6 class="text-uppercase text-secondary">Selesai</h6>
                <h1 class="text-success">
                    {{ $laporan_selesai ?? 0 }}
                </h1>
            </div>
        </div>

    </div>

</div>

@endsection