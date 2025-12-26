@extends('backend.v_layouts.app')

@section('content')

<div class="row"> 
    <div class="col-12"> 
        <div class="card"> 
            <div class="card-body"> 
                <h5 class="card-title">Data Laporan Kekerasan Anak</h5> 
                <div class="table-responsive"> 
                    <table id="zero_config" class="table table-striped table-bordered">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Lokasi</th>
                                <th>Jenis Kekerasan</th>
                                <th>Deskripsi</th>
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
                                <td>{{ $row->deskripsi_singkat }}</td>

                                <td>
                                    @php $ext = pathinfo($row->upload_bukti, PATHINFO_EXTENSION); @endphp
                                    @if(in_array($ext, ['jpg','jpeg','png']))
                                        <img src="{{ asset('storage/bukti/'.$row->upload_bukti) }}" width="100">
                                    @elseif($ext == 'mp4')
                                        <video width="150" controls>
                                            <source src="{{ asset('storage/bukti/'.$row->upload_bukti) }}" type="video/mp4">
                                        </video>
                                    @endif
                                </td>

                                <td>{{ $row->status_laporan }}</td>

                                <td>
                                    <a href="{{ route('laporan.edit', $row->id) }}" class="btn btn-warning btn-sm">Ubah</a>

                                    <form method="POST" action="{{ route('laporan.destroy', $row->id) }}" style="display:inline;">
                                        @csrf @method('delete')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>

@endsection
