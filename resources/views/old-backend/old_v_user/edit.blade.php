@extends('backend.v_layouts.app')

@section('content')
<h3>{{ $judul }}</h3>

<form action="{{ route('backend.user.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama:</label>
    <input type="text" name="nama" value="{{ $user->nama }}">

    <label>Email:</label>
    <input type="text" name="email" value="{{ $user->email }}">

    <label>Role:</label>
    <select name="role">
        <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Admin</option>
        <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Pelapor</option>
    </select>

    <button type="submit">Update</button>
</form>
@endsection
