@extends('backend.v_layouts.app')

@section('content')
<div class="container-fluid py-4">

    <h4 class="text-dark font-weight-bold mb-3">Edit Laporan</h4>

    <div class="card shadow border-radius-xl p-4">

        <form action="{{ route('laporan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <label class="mt-2">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $laporan->nama }}">

            <label class="mt-2">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ $laporan->lokasi }}">

            <label class="mt-2">Jenis Kekerasan</label>
            <select name="jenis_kekerasan" class="form-control">
                <option value="fisik"     {{ $laporan->jenis_kekerasan == 'fisik' ? 'selected':'' }}>Fisik</option>
                <option value="psikis"    {{ $laporan->jenis_kekerasan == 'psikis' ? 'selected':'' }}>Psikis</option>
                <option value="seksual"   {{ $laporan->jenis_kekerasan == 'seksual' ? 'selected':'' }}>Seksual</option>
                <option value="penelantaran" {{ $laporan->jenis_kekerasan == 'penelantaran' ? 'selected':'' }}>Penelantaran</option>
            </select>

            <label class="mt-2">Deskripsi Singkat</label>
            <textarea name="deskripsi_singkat" class="form-control">{{ $laporan->deskripsi_singkat }}</textarea>

            <label class="mt-2">Upload Bukti</label>
            <input type="file" name="upload_bukti" class="form-control">

            @if($laporan->upload_bukti)
                <p class="mt-2">Bukti saat ini:</p>
                <img src="{{ asset('storage/bukti/'.$laporan->upload_bukti) }}" width="120">
            @endif

            <label class="mt-3">Status Laporan</label>
            <select name="status_laporan" class="form-control">
                <option value="baru" {{ $laporan->status_laporan=='baru' ? 'selected':'' }}>Baru</option>
                <option value="proses" {{ $laporan->status_laporan=='proses' ? 'selected':'' }}>Diproses</option>
                <option value="selesai" {{ $laporan->status_laporan=='selesai' ? 'selected':'' }}>Selesai</option>
            </select>

            <button class="btn btn-primary mt-4">Update</button>

        </form>

    </div>

</div>
@endsection