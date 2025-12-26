@extends('backend.v_layouts.app') 
@section('content') 
<!-- contentAwal --> 
 
<h3 style="font-size: 28px; font-weight: bold; margin-bottom: 20px;">
    {{$judul}}
</h3> 
    <div style="text-align:center; margin-top: 20px;">
        <img src="{{ asset('image/banner.jpg') }}" 
             alt="Banner SIPKA"
             style="width: 600px; max-width: 100%; border-radius: 15px;">
    </div>
<p style="margin-top: 30px; font-size: 20px; line-height:1.6; text-align: center;">
    Selamat Datang, <b>{{ Auth::user()->nama}}</b> pada aplikasi SIPKA (Sistem Informasi Pelaporan dan Edukasi Kekerasan Anak)
    dengan hak akses yang anda miliki sebagai <b> 
        @if (Auth::user()->role ==1) 
        Pelapor
        @elseif(Auth::user()->role ==0) 
        Admin 
        @endif 
    </b> 
    ini adalah halaman utama dari aplikasi ini. 
</p> 

 
<!-- contentAkhir --> 
@endsection 