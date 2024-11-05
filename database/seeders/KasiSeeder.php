<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kasi;


class KasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Kasi::create(['nama' => 'KASI 1', 'jabatan' => 'Jabatan A', 'nip' => '123456789']);
        Kasi::create(['nama' => 'KASI 2', 'jabatan' => 'Jabatan B', 'nip' => '987654321']);
        Kasi::create(['nama' => 'KASI 3', 'jabatan' => 'Jabatan C', 'nip' => '123123123']);
    }
}
