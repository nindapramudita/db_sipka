@extends('backend.v_layouts.app')

@section('content')
<div class="container-fluid py-4">

    <h4 class="text-dark font-weight-bold mb-3">Edit User</h4>

    <div class="card shadow border-radius-xl p-4">

        <form action="{{ route('backend.user.update', $user->id) }}" method="POST">
            @csrf
            @method('put')

            <label class="mt-2">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $user->nama }}">

            <label class="mt-2">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}">

            <label class="mt-2">Role</label>
            <select name="role" class="form-control">
                <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Admin</option>
                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Pelapor</option>
            </select>

            <button class="btn btn-primary mt-3">Update</button>

        </form>

    </div>

</div>
@endsection