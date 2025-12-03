@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus mr-2"></i>    
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap">
            <div class="mb-1 mr-2">
                <a href="{{ route('user') }}" class="btn btn-sm btn-danger">
                    <i class="fas fa-arrow-left mr-2"></i>    
                    Kembali
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('userStore') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Nama :
                        </label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Email :
                        </label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Jabatan :
                        </label>
                        <select name="jabatan" class="form-control" required>
                            <option selected disabled>-- Pilih Jabatan --</option>
                            <option value="Admin">Admin</option>
                            <option value="Karyawan">Karyawan</option>
                        </select>        
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> Password :
                        </label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> Konfirmasi Password :
                        </label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <div>
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fas fa-save mr-2"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
