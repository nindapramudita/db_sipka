@extends('backend.v_layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="d-flex justify-content-between mb-3">
        <h4 class="text-dark font-weight-bold">Data Laporan Kekerasan Anak</h4>
        <a href="{{ route('laporan.create') }}" class="btn btn-primary">
            + Tambah Laporan
        </a>
    </div>

    <div class="card shadow border-radius-xl p-4">
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead>
                    <tr class="text-secondary">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Lokasi</th>
                        <th>Jenis Kekerasan</th>
                        <th>Bukti</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($laporan as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->lokasi }}</td>
                        <td>{{ $row->jenis_kekerasan }}</td>

                        <td>
                            @php $ext = pathinfo($row->upload_bukti, PATHINFO_EXTENSION); @endphp

                            @if(in_array($ext, ['jpg','jpeg','png']))
                                <img src="{{ asset('storage/bukti/'.$row->upload_bukti) }}" width="80" class="rounded">
                            @elseif($ext == 'mp4')
                                <video width="120" controls>
                                    <source src="{{ asset('storage/bukti/'.$row->upload_bukti) }}" type="video/mp4">
                                </video>
                            @endif
                        </td>

                        <td>
                            <span class="badge {{ $row->status_laporan == 'baru' ? 'bg-warning' : 'bg-success' }}">
                                {{ $row->status_laporan }}
                            </span>
                        </td>

                        <td>
                            <a href="{{ route('laporan.edit', $row->id) }}" class="btn btn-sm btn-info">Edit</a>

                            <form action="{{ route('laporan.destroy', $row->id) }}"
                                  method="POST" style="display:inline;">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin hapus?')">
                                    Hapus
                                </button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection