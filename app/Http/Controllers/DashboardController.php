<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total user
        $totalUser = User::count();

        // Hitung total karyawan
        $totalKaryawan = User::where('jabatan', 'Karyawan')->count();

        // Hitung total admin
        $totalAdmin = User::where('jabatan', 'Admin')->count();

        $data = [
            "title"          => "Dashboard",
            "menuDashboard"  => "active",
            "totalUser"      => $totalUser,
            "totalKaryawan"  => $totalKaryawan,
            "totalAdmin"     => $totalAdmin,
        ];

        return view('dashboard', $data);
    }
}