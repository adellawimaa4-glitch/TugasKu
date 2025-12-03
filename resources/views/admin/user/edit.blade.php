@extends('layouts./app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-edit mr-2"></i> Edit User
</h1>

<div class="card p-4">
    <form action="{{ route('userUpdate', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control"
                   value="{{ old('nama', $user->nama) }}" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label>Jabatan:</label>
            <select name="jabatan" class="form-control" required>
                <option value="Admin" {{ $user->jabatan == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="Karyawan" {{ $user->jabatan == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
            </select>
        </div>

        <div class="form-group">
            <label>Password (isi kalau mau ganti):</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label>Konfirmasi Password:</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <button class="btn btn-primary mt-3">Update</button>
        <a href="{{ route('user') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
