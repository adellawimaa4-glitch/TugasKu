<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama'      => 'Adella Wima',
            'email'     => 'admin@gmail.com',
            'jabatan'   => 'Admin',
            'password'  => Hash::make('1234567890'),
            'is_tugas'  => false,
        ]);

        User::create([
            'nama'      => 'Ada Mazurek',
            'email'     => 'adamazurek@gmail.com',
            'jabatan'   => 'Karyawan',
            'password'  => Hash::make('1234567890'),
            'is_tugas'  => false,
        ]);

        User::create([
            'nama'      => 'Bayu Beler',
            'email'     => 'bayubeler@gmail.com',
            'jabatan'   => 'Karyawan',
            'password'  => Hash::make('1234567890'),
            'is_tugas'  => false,
        ]);
    }
}
