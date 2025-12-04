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
            "tugas"         => Tugas::all(),
        ];

        return view('admin.tugas.index', $data);
    }

    // FORM TAMBAH TUGAS
    public function create()
    {
        $data = [
            "title"         => "Tambah Tugas",
            "menuAdminTugas"=> "active",
            "users"         => User::all(),
        ];

        return view('admin.tugas.create', $data);
    }

    // =========================== STORE (UPDATE STATUS USER) ===========================
    public function store(Request $request)
    {
        $request->validate([
            'nama'        => 'required',
            'tugas'       => 'required',
            'tgl_mulai'   => 'required|date',
            'tgl_selesai' => 'required|date',
        ]);

        // SIMPAN TUGAS BARU
        Tugas::create([
            'nama'        => $request->nama,
            'tugas'       => $request->tugas,
            'tgl_mulai'   => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
        ]);

        // UPDATE STATUS USER = SUDAH DITUGASKAN
        User::where('nama', $request->nama)->update([
            'is_tugas' => true
        ]);

        return redirect()->route('tugas')->with('success', 'Tugas berhasil ditambahkan');
    }

    // FORM EDIT
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

    // =========================== UPDATE (STATUS TETAP TRUE) ===========================
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

        // PASTIKAN USER TETAP STATUS DITUGASKAN
        User::where('nama', $request->nama)->update([
            'is_tugas' => true
        ]);

        return redirect()->route('tugas')->with('success', 'Tugas berhasil diupdate');
    }

    // =========================== DESTROY (KEMBALIKAN STATUS JIKA TIDAK ADA TUGAS) ===========================
    public function destroy($id)
    {
        $tugas = Tugas::findOrFail($id);
        $namaUser = $tugas->nama;
        $tugas->delete();

        // CEK APAKAH USER MASIH PUNYA TUGAS
        $masihAda = Tugas::where('nama', $namaUser)->exists();

        if (! $masihAda) {
            User::where('nama', $namaUser)->update([
                'is_tugas' => false
            ]);
        }

        return redirect()->route('tugas')->with('success', 'Tugas berhasil dihapus');
    }
}
