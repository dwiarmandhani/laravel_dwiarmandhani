<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RumahSakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rumah_sakits')->insert([
            [
                'nama_rumah_sakit' => 'Rumah Sakit A',
                'alamat' => 'Jl. A No.1',
                'email' => 'rs_a@example.com',
                'telepon' => '08123456789',
            ],
            [
                'nama_rumah_sakit' => 'Rumah Sakit B',
                'alamat' => 'Jl. B No.2',
                'email' => 'rs_b@example.com',
                'telepon' => '08123456788',
            ],
        ]);
    }
}
