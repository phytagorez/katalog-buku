<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('karyawans')->insert([
        //     [
        //         'nama' => 'John Doe Ejak',
        //         'alamat' => 'Jl. UNEJ Fasilkom',
        //     ],
        //     [
        //         'nama' => 'Jane Smith Divo',
        //         'alamat' => 'Jl. Filkom Brawijaya',
        //     ],
        // ]);

        Karyawan::insert([
            'nama' => 'John Doe Ejak',
            'alamat' => 'Jl. UNEJ Fasilkom',
        ]);
    }
}
