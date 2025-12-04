<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tugas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        // Hitung data user
       $totalUser     = User::count();
$totalAdmin    = User::where('jabatan', 'Admin')->count();
$totalKaryawan = User::where('jabatan', 'Karyawan')->count();

// jumlah tugas yang sudah dibuat (anggap = karyawan yang sudah ditugaskan)
$totalDitugaskan = Tugas::count();

// karyawan yang belum punya tugas
$totalBelumDitugaskan = max($totalKaryawan - $totalDitugaskan, 0);


        // Untuk highlight menu Dashboard di sidebar
        $menuDashboard = 'active';

        // PERHATIKAN: view-nya 'dashboard', bukan 'admin.dashboard'
        return view('dashboard', compact(
            'title',
            'totalUser',
            'totalAdmin',
            'totalKaryawan',
            'totalDitugaskan',
            'totalBelumDitugaskan',
            'menuDashboard'
        ));
    }
}
