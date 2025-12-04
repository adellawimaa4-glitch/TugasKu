<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Tugas;
use Barryvdh\DomPDF\Facade\Pdf; // <-- setelah install error langsung hilang

class KaryawanController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $punyaTugas = Tugas::where('nama', $user->nama)->exists();

        return view('karyawan.dashboard', [
            'title'  => 'Dashboard',
            'status' => $punyaTugas ? 'DITUGASKAN' : 'BELUM ADA TUGAS'
        ]);
    }

    public function tugas()
    {
        $user = Auth::user();
        return view('karyawan.tugas', [
            'title' => 'Data Tugas Saya',
            'tugas' => Tugas::where('nama', $user->nama)->get()
        ]);
    }

    public function tugasPdf()
    {
        $user  = Auth::user();
        $tugas = Tugas::where('nama', $user->nama)->firstOrFail();

        $pdf = Pdf::loadView('karyawan.tugas_pdf', compact('user','tugas'));
        return $pdf->download('tugas-'.$user->nama.'.pdf');
    }
}
