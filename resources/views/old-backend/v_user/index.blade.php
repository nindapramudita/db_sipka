@extends('backend.v_layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="d-flex justify-content-between mb-3">
        <h4 class="text-dark font-weight-bold">Data User SIPKA</h4>
        <a href="{{ route('backend.user.create') }}" class="btn btn-primary">
            + Tambah User
        </a>
    </div>

    <div class="card shadow border-radius-xl p-3">
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead>
                    <tr class="text-secondary">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($user as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->email }}</td>
                        <td>
                            @if ($row->role == 0)
                                <span class="badge bg-primary">Admin</span>
                            @else
                                <span class="badge bg-warning">Pelapor</span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('backend.user.edit', $row->id) }}" 
                               class="btn btn-sm btn-info">Edit</a>

                            <form action="{{ route('backend.user.destroy', $row->id) }}" method="POST" style="display:inline;">
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