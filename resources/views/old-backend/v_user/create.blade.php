@extends('backend.v_layouts.app')

@section('content')
<div class="container-fluid py-4">

    <h4 class="text-dark font-weight-bold mb-3">Tambah User</h4>

    <div class="card shadow border-radius-xl p-4">

        <form action="{{ route('backend.user.store') }}" method="POST">
            @csrf

            <label class="mt-2">Nama</label>
            <input type="text" name="nama" class="form-control">

            <label class="mt-2">Email</label>
            <input type="email" name="email" class="form-control">

            <label class="mt-2">Password</label>
            <input type="password" name="password" class="form-control">

            <label class="mt-2">Role</label>
            <select name="role" class="form-control">
                <option value="0">Admin</option>
                <option value="1">Pelapor</option>
            </select>

            <button class="btn btn-success mt-3">Simpan</button>

        </form>

    </div>

</div>
@endsection