@extends('layouts./app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-tasks mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
            <div class="mb-1 mr-2">
                <a href="{{ route('tugasCreate') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah data
                </a>
            </div>
            <div>
                <button type="button" id="btnExcel" class="btn btn-sm btn-success">
                    <i class="fas fa-file-excel mr-2"></i>
                    Excel
                </button>
                <button type="button" id="btnPdf" class="btn btn-sm btn-danger">
                    <i class="fas fa-file-pdf mr-2"></i>
                    PDF
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                {{-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> --}}
                    <table class="table table-bordered"
                        id="dataTable"
                        width="100%"
                        cellspacing="0"
                        data-title="Rekap Data Tugas">
                    <thead class="bg-primary text-white">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tugas</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tugas as $item)
                            <tr>
                                <td class="text-center">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->tugas }}</td>
                                <td class="text-center">
                                    <span class="badge badge-info">
                                        {{ \Carbon\Carbon::parse($item->tgl_mulai)->format('d-m-Y') }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-info">
                                        {{ \Carbon\Carbon::parse($item->tgl_selesai)->format('d-m-Y') }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    {{-- tombol edit --}}
                                    <a href="{{ route('tugasEdit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    {{-- tombol delete --}}
                                    <form action="{{ route('tugasDestroy', $item->id) }}"
                                          method="POST"
                                          class="d-inline form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
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