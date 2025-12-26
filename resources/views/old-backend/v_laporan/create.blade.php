@extends('backend.v_layouts.app')

@section('content')
<div class="container-fluid py-4">

    <h4 class="text-dark font-weight-bold mb-3">Tambah Laporan Kekerasan</h4>

    <div class="card shadow border-radius-xl p-4">

        <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="mt-2">Nama</label>
            <input type="text" name="nama" class="form-control">

            <label class="mt-2">Lokasi</label>
            <input type="text" name="lokasi" class="form-control">

            <label class="mt-2">Jenis Kekerasan</label>
            <select name="jenis_kekerasan" class="form-control">
                <option value="fisik">Fisik</option>
                <option value="psikis">Psikis</option>
                <option value="seksual">Seksual</option>
                <option value="penelantaran">Penelantaran</option>
            </select>

            <label class="mt-2">Deskripsi Singkat</label>
            <textarea name="deskripsi_singkat" class="form-control"></textarea>

            <label class="mt-2">Upload Bukti</label>
            <input type="file" name="upload_bukti" class="form-control">

            <button class="btn btn-success mt-3">Simpan</button>

        </form>

    </div>

</div>
@endsection