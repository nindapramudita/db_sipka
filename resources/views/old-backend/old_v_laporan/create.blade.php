@extends('backend.v_layouts.app')
@section('content')
<h3> {{$judul}} </h3>
<form action="{{ route('laporan.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <label>Nama Pelapor</label><br>
    <input type="text" name="nama" id="" 
        value="{{old('nama')}}" 
        placeholder="Masukkan Nama Pelapor Lengkap" 
        class="form-control @error('nama') is-invalid @enderror">
    @error('nama')
    <span class="invalid-feedback alert-danger" role="alert">
        {{$message}}
    </span>
    @enderror
    <p></p>

    <label>Lokasi Kejadian</label><br>
    <input type="text" name="lokasi" id=""
        value="{{old('lokasi')}}"
        placeholder="Masukkan Lokasi Kejadian"
        class="form-control @error('lokasi') is-invalid @enderror">
    @error('lokasi')
    <span class="invalid-feedback alert-danger" role="alert">
        {{$message}}
    </span>
    @enderror
    <p></p>

    <label>Jenis Kekerasan</label><br>
    <input type="text" name="jenis_kekerasan" id=""
        value="{{old('jenis_kekerasan')}}"
        placeholder="Contoh: Fisik, Verbal, Seksual, dll"
        class="form-control @error('jenis_kekerasan') is-invalid @enderror">
    @error('jenis_kekerasan')
    <span class="invalid-feedback alert-danger" role="alert">
        {{$message}}
    </span>
    @enderror
    <p></p>

    <label>Deskripsi Singkat</label><br>
    <textarea name="deskripsi_singkat"
        placeholder="Tuliskan ringkasan kejadian"
        class="form-control @error('deskripsi_singkat') is-invalid @enderror">{{old('deskripsi_singkat')}}</textarea>
    @error('deskripsi_singkat')
    <span class="invalid-feedback alert-danger" role="alert">
        {{$message}}
    </span>
    @enderror
    <p></p>

    <label>Upload Bukti</label><br>
    <input type="file" name="upload_bukti"
        class="form-control @error('upload_bukti') is-invalid @enderror">
    @error('upload_bukti')
    <span class="invalid-feedback alert-danger" role="alert">
        {{$message}}
    </span>
    @enderror
    <p></p>

    <button type="submit">Simpan</button>
    <a href="{{ route('laporan.index') }}">
        <button type="button">Batal</button>
    </a>
</form>