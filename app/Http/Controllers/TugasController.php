<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\User;

class TugasController extends Controller
{
    // LIST DATA TUGAS
    public function index()
    {
        $data = [
            "title"         => "Data Tugas",
            "menuAdminTugas"=> "active",
            "tugas"         => Tugas::all(),   // ambil semua tugas
        ];

        return view('admin.tugas.index', $data);
    }

    // FORM TAMBAH TUGAS
    public function create()
    {
        $data = [
            "title"         => "Tambah Tugas",
            "menuAdminTugas"=> "active",
            "users"         => User::all(),   // dropdown karyawan
        ];

        return view('admin.tugas.create', $data);
    }

    // SIMPAN TUGAS BARU
    public function store(Request $request)
    {
        $request->validate([
            'nama'        => 'required',
            'tugas'       => 'required',
            'tgl_mulai'   => 'required|date',
            'tgl_selesai' => 'required|date',
        ]);

        Tugas::create([
            'nama'        => $request->nama,
            'tugas'       => $request->tugas,
            'tgl_mulai'   => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
        ]);

        return redirect()->route('tugas')->with('success', 'Tugas berhasil ditambahkan');
    }

    // FORM EDIT TUGAS
    public function edit($id)
    {
        $tugas = Tugas::findOrFail($id);

        $data = [
            "title"         => "Edit Tugas",
            "menuAdminTugas"=> "active",
            "tugas"         => $tugas,
        ];

        return view('admin.tugas.edit', $data);
    }

    // UPDATE TUGAS
    public function update(Request $request, $id)
    {
        $request->validate([
    'nama'        => 'required',
    'tugas'       => 'required',
    'tgl_mulai'   => 'required|date',
    'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
    ]);


        $tugas = Tugas::findOrFail($id);

        $tugas->update([
            'nama'        => $request->nama,
            'tugas'       => $request->tugas,
            'tgl_mulai'   => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
        ]);

        return redirect()->route('tugas')->with('success', 'Tugas berhasil diupdate');
    }

    // HAPUS TUGAS
    public function destroy($id)
    {
        $tugas = Tugas::findOrFail($id);
        $tugas->delete();

        return redirect()->route('tugas')->with('success', 'Tugas berhasil dihapus');
    }
}
