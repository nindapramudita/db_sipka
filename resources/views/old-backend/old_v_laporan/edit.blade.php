@extends('backend.v_layouts.app')
@section('content')
<h3> {{$judul}} </h3> 
<form action="{{ route('laporan.store') }}" method="post"> 
    @method('put')
    @csrf 
    <label>Nama Pelapor</label><br>
    <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama pelapor">
    <p></p>

    <label>Lokasi Kejadian</label><br>
    <input type="text" name="lokasi" value="{{ old('lokasi') }}" placeholder="Masukkan lokasi kejadian">
    <p></p>

    <label>Jenis Kekerasan</label><br>
    <input type="text" name="jenis_kekerasan" value="{{ old('jenis_kekerasan') }}" placeholder="Contoh: Fisik, Verbal, dll">
    <p></p>

    <label>Deskripsi Singkat</label><br>
    <textarea name="deskripsi_singkat" placeholder="Tuliskan ringkasan kejadian">{{ old('deskripsi_singkat') }}</textarea>
    <p></p>

    <label>Upload Bukti (opsional)</label><br>
    <input type="file" name="upload_bukti">
    <p></p>

    <button type="submit">Perbaharui</button>
    <a href="{{ route('laporan.index') }}">
        <button type="button">Batal</button>
    </a>
</form>