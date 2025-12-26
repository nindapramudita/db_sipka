<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\laporan;
use App\Models\user;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        laporan::create([
            'nama' => 'Helberd',
            'lokasi' => 'Bogor',
            'jenis_kekerasan' => 'Fisik',
            'deskripsi_singkat' => 'Anak mengalami kekerasan fisik oleh orang tua',
            'upload_bukti' => 'bukti1.jpg',
            'status_laporan' => 'Baru',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
         laporan::create([
            'nama' => 'Febrian',
            'lokasi' => 'Bekasi',
            'jenis_kekerasan' => 'Verbal',
            'deskripsi_singkat' => 'Anak sering dimarahi dan diancam oleh guru di sekolah',
            'upload_bukti' => 'bukti2.jpg',
            'status_laporan' => 'Diproses',
            'created_at' => now(),
            'updated_at' => now(),
         ]);
         laporan::create([
            'nama' => 'Haydar',
            'lokasi' => 'Depok',
            'jenis_kekerasan' => 'Psikis',
            'deskripsi_singkat' => 'Anak mendapat tekanan mental dari lingkungan sekitar',
            'upload_bukti' => 'bukti3.jpg',
            'status_laporan' => 'Diproses',
            'created_at' => now(),
            'updated_at' => now(),
         ]);

         //YANG DI BAWAH INI ISI MINGGU 5 DATABASE YANG P4 JANGAN DI HAPUS LANJUTIN DI BAWAHNYA AJA 
         // KALO UDAH DIJALANIN DULU DI TERMINAL BIAR KE UPDATE DATA DI DATABASE
            
           //PAKE  php artisan migrate:fresh --seed

           User::create([
            'nama' => 'Admin SIPKA',
            'email' => 'admin@sipka.com',
            'password' => bcrypt('admin123'),
            'role' => '0', // 0 = Admin
            'hp' => '08123456789',
        ]);

        User::create([
            'nama' => 'Helberd',
            'email' => 'helberd25@gmail.com',
            'password' => bcrypt('helberd25'),
            'role' => '1', // 1 = Pelapor
            'hp' => '08123456780',
        ]);

    }
}

