@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-4">Data Tugas</h3>

    <div class="row justify-content-center">
        <div class="col-md-6">

            @if($tugas->count() > 0)
                @php
                    $item = $tugas->first();
                @endphp

                <div class="card shadow-sm p-4">

                    <p><b>Nama</b> : {{ auth()->user()->nama }}</p>
                    <p><b>Email</b> : {{ auth()->user()->email }}</p>
                    <p><b>Tugas</b> : {{ $item->tugas }}</p>

                    <p><b>Tanggal Mulai</b> :
                        <span class="badge bg-info text-white">{{ $item->tgl_mulai }}</span>
                    </p>

                    <p><b>Tanggal Selesai</b> :
                        <span class="badge bg-info text-white">{{ $item->tgl_selesai }}</span>
                    </p>

                    {{-- TOMBOL PDF FULL --}}
                    <a href="{{ route('karyawanTugasPdf') }}" class="btn btn-danger w-100 mt-3">
                        <i class="fa fa-file-pdf-o"></i> PDF
                    </a>

                </div>
            @else
                <div class="alert alert-warning">
                    Belum ada tugas untuk anda.
                </div>
            @endif

        </div>
    </div>

</div>
@endsection
