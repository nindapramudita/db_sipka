@extends('backend.v_layouts.app')

@section('content')
<h3>{{ $judul }}</h3>

<form action="{{ route('backend.user.store') }}" method="POST">
    @csrf

    <label>Nama:</label>
    <input type="text" name="nama">

    <label>Email:</label>
    <input type="text" name="email">

    <label>Password:</label>
    <input type="password" name="password">

    <label>Hp:</label>
    <input type="text" name="hp">

    <label>Role:</label>
    <select name="role">
        <option value="0">Admin</option>
        <option value="1">Pelapor</option>
    </select>

    <button type="submit">Simpan</button>
</form>
@endsection
