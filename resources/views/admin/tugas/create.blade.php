@extends('layouts./app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-plus mr-2"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-header">
        <a href="{{ route('tugas') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    <div class="card-body">
        <form action="{{ route('tugasStore') }}" method="POST">
            @csrf

            {{-- Nama Karyawan --}}
            <div class="form-group">
                <label for="nama">Nama Karyawan</label>
                {{-- kalau mau pilih dari tabel user --}}
                <select name="nama" id="nama" class="form-control">
                    <option value="">-- Pilih Karyawan --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->nama }}" {{ old('nama') == $user->nama ? 'selected' : '' }}>
                            {{ $user->nama }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                @error('nama')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Tugas --}}
            <div class="form-group">
                <label for="tugas">Tugas</label>
                <input type="text" name="tugas" id="tugas"
                       class="form-control"
                       value="{{ old('tugas') }}"
                       placeholder="Contoh: Membuat laporan bulanan">
                @error('tugas')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Tanggal Mulai --}}
            <div class="form-group">
                <label for="tgl_mulai">Tanggal Mulai</label>
                <input type="date" name="tgl_mulai" id="tgl_mulai"
                       class="form-control"
                       value="{{ old('tgl_mulai') }}">
                @error('tgl_mulai')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Tanggal Selesai --}}
            <div class="form-group">
                <label for="tgl_selesai">Tanggal Selesai</label>
                <input type="date" name="tgl_selesai" id="tgl_selesai"
                       class="form-control"
                       value="{{ old('tgl_selesai') }}">
                @error('tgl_selesai')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save mr-2"></i> Simpan
            </button>
        </form>
    </div>
</div>

@endsection
