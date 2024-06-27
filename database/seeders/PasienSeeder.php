<?php

namespace Database\Seeders;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $rumahSakit = RumahSakit::first();

        if ($rumahSakit) {
            Pasien::create([
                'nama_pasien' => 'Pasien Contoh',
                'alamat' => 'Alamat Contoh',
                'no_telpon' => '08123456789',
                'rumah_sakit_id' => $rumahSakit->id
            ]);
        }
    }
}
