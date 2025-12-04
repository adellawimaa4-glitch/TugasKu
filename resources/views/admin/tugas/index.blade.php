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
                                <td class="text-center">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </td>
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

                                    {{-- tombol view -> modal detail --}}
                                    <button type="button"
                                            class="btn btn-sm text-white"
                                            style="background-color:#1CC88A;"
                                            data-toggle="modal"
                                            data-target="#modalDetail{{ $item->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    {{-- tombol edit --}}
                                    <a href="{{ route('tugasEdit', $item->id) }}"
                                       class="btn btn-sm"
                                       style="background-color:#f1c40f; color:#ffffff;">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    {{-- tombol delete -> modal konfirmasi --}}
                                    <button type="button"
                                            class="btn btn-sm"
                                            style="background-color:#e74c3c; color:#ffffff;"
                                            data-toggle="modal"
                                            data-target="#modalDelete{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- ============ MODAL DETAIL & DELETE UNTUK TUGAS ============ --}}
            @foreach ($tugas as $item)
                {{-- MODAL DETAIL --}}
                <div class="modal fade" id="modalDetail{{ $item->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header" style="background-color:#1CC88A;">
                                <h5 class="modal-title text-white mb-0">Detail Data Tugas</h5>
                                <button type="button" class="close text-white" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <table class="table table-borderless mb-0">
                                    <tr>
                                        <td style="width: 35%;"><strong>Nama</strong></td>
                                        <td>: {{ $item->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tugas</strong></td>
                                        <td>: {{ $item->tugas }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tanggal Mulai</strong></td>
                                        <td>: {{ \Carbon\Carbon::parse($item->tgl_mulai)->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tanggal Selesai</strong></td>
                                        <td>: {{ \Carbon\Carbon::parse($item->tgl_selesai)->format('d-m-Y') }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="modal-footer d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    <i class="fas fa-times mr-1"></i> Tutup
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MODAL DELETE --}}
                <div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header" style="background-color:#e74a3b;">
                                <h5 class="modal-title text-white mb-0">Hapus Data Tugas ?</h5>
                                <button type="button" class="close text-white" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <p class="mb-2">
                                    Apakah Anda yakin ingin menghapus tugas ini?
                                </p>
                                <table class="table table-borderless mb-0">
                                    <tr>
                                        <td style="width: 35%;"><strong>Nama</strong></td>
                                        <td>: {{ $item->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tugas</strong></td>
                                        <td>: {{ $item->tugas }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tanggal Mulai</strong></td>
                                        <td>: {{ \Carbon\Carbon::parse($item->tgl_mulai)->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tanggal Selesai</strong></td>
                                        <td>: {{ \Carbon\Carbon::parse($item->tgl_selesai)->format('d-m-Y') }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Batal
                                </button>

                                <form action="{{ route('tugasDestroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash mr-1"></i> Hapus
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
            {{-- ============ END MODAL ============ --}}

        </div>
    </div>
@endsection
