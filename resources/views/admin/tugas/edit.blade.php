@extends('layouts./app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-edit mr-2"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-header">
        <a href="{{ route('tugas') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    <div class="card-body">
        <form action="{{ route('tugasUpdate', $tugas->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Nama Karyawan --}}
            <div class="form-group">
                <label for="nama">Nama Karyawan</label>
                <input type="text"
                       name="nama"
                       id="nama"
                       class="form-control"
                       value="{{ old('nama', $tugas->nama) }}">
                @error('nama')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Tugas --}}
            <div class="form-group">
                <label for="tugas">Tugas</label>
                <input type="text"
                       name="tugas"
                       id="tugas"
                       class="form-control"
                       value="{{ old('tugas', $tugas->tugas) }}">
                @error('tugas')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Tanggal Mulai --}}
            <div class="form-group">
                <label for="tgl_mulai">Tanggal Mulai</label>
                <input type="date"
                       name="tgl_mulai"
                       id="tgl_mulai"
                       class="form-control"
                       value="{{ old('tgl_mulai', $tugas->tgl_mulai) }}">
                @error('tgl_mulai')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Tanggal Selesai --}}
            <div class="form-group">
                <label for="tgl_selesai">Tanggal Selesai</label>
                <input type="date"
                       name="tgl_selesai"
                       id="tgl_selesai"
                       class="form-control"
                       value="{{ old('tgl_selesai', $tugas->tgl_selesai) }}">
                @error('tgl_selesai')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save mr-2"></i> Update
            </button>
        </form>
    </div>
</div>

@endsection
