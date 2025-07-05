<?php

namespace Database\Seeders;

use App\Models\Admin;
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

        Admin::create([
            'nama' => 'Test Admin',
            'email' => 'test@example.com',
            'username' => 'admin',
            'password' => Hash::make('12341234'),
            'alamat' => 'borobudur',
            'nomor_hp' => '085728006072',
            'jenis_kelamin' => 'laki laki',
        ]);
    }
}
