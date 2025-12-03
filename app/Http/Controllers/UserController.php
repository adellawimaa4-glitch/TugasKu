<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // LIST USER
    public function index()
    {
        $users = User::latest()->get();

        return view('admin.user.index', [
            'title'         => 'Data User',
            'users'         => $users,
            'menuAdminUser' => 'active',
        ]);
    }

    // FORM TAMBAH USER
    public function create()
    {
        return view('admin.user.create', [
            'title'         => 'Tambah User',
            'menuAdminUser' => 'active',
        ]);
    }

    // SIMPAN USER BARU
    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required',
            'email'    => 'required|unique:users,email',
            'jabatan'  => 'required',
            'password' => 'required|confirmed|min:8',
        ], [
            'nama.required'      => 'Nama Tidak Boleh Kosong',
            'email.required'     => 'Email Tidak Boleh Kosong',
            'email.unique'       => 'Email Sudah Terdaftar',
            'jabatan.required'   => 'Jabatan Harus Dipilih',
            'password.required'  => 'Password Tidak Boleh Kosong',
            'password.confirmed' => 'Konfirmasi Password Tidak Sama',
            'password.min'       => 'Password Minimal 8 Karakter',
        ]);

        $user = new User;
        $user->nama     = $request->nama;
        $user->email    = $request->email;
        $user->jabatan  = $request->jabatan;
        $user->password = Hash::make($request->password);
        $user->is_tugas = false;
        $user->save();

        return redirect()->route('user')->with('success', 'Data Berhasil Ditambahkan');
    }

    // FORM EDIT USER
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', [
            'title'         => 'Edit User',
            'user'          => $user,
            'menuAdminUser' => 'active',
        ]);
    }

    // UPDATE USER
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama'    => 'required',
            'email'   => 'required|email|unique:users,email,' . $user->id,
            'jabatan' => 'required',
            'password' => 'nullable|confirmed|min:8',
        ], [
            'nama.required'      => 'Nama Tidak Boleh Kosong',
            'email.required'     => 'Email Tidak Boleh Kosong',
            'email.email'        => 'Format Email Tidak Valid',
            'email.unique'       => 'Email Sudah Terdaftar',
            'jabatan.required'   => 'Jabatan Harus Dipilih',
            'password.confirmed' => 'Konfirmasi Password Tidak Sama',
            'password.min'       => 'Password Minimal 8 Karakter',
        ]);

        $user->nama    = $request->nama;
        $user->email   = $request->email;
        $user->jabatan = $request->jabatan;

        // password hanya diganti kalau diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user')->with('success', 'Data user berhasil diupdate');
    }

    // HAPUS USER
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user')->with('success', 'Data user berhasil dihapus');
    }
}
