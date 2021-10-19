<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelola_laporan')->insert([
            [
               'id_jenis' => 2,
               'id_nama_produk' =>1,
               'witel' => 'BANDUNG',
               'tgtmtd' => 2447,
               'realmtd' => 193,
               'ach' => 0,
               'shrtge' => 100,
               'tgtrev' => 234,
               'progrev' => 234,
               'achrev' => 234,
               'created_at' => now(),
               'updated_at' => now()

            ],
            [
               'id_jenis' => 2,
               'id_nama_produk' =>1,
               'witel' => 'CIREBON',
               'tgtmtd' => 2447,
               'realmtd' => 193,
               'ach' => 0,
               'shrtge' => 100,
               'tgtrev' => 234,
               'progrev' => 234,
               'achrev' => 234,
               'created_at' => now(),
               'updated_at' => now()

            ],
            [
               'id_jenis' => 2,
               'id_nama_produk' =>1,
               'witel' => 'KARAWANG',
               'tgtmtd' => 2447,
               'realmtd' => 193,
               'ach' => 0,
               'shrtge' => 100,
               'tgtrev' => 234,
               'progrev' => 234,
               'achrev' => 234,
               'created_at' => now(),
               'updated_at' => now()
            ],
            [
               'id_jenis' => 2,
               'id_nama_produk' =>1,
               'witel' => 'BANDUNG BRT',
               'tgtmtd' => 2447,
               'realmtd' => 193,
               'ach' => 0,
               'shrtge' => 100,
               'tgtrev' => 234,
               'progrev' => 234,
               'achrev' => 234,
               'created_at' => now(),
               'updated_at' => now()
            ],
            [
               'id_jenis' => 2,
               'id_nama_produk' =>1,
               'witel' => 'TASIKMALAYA',
               'tgtmtd' => 2447,
               'realmtd' => 193,
               'ach' => 0,
               'shrtge' => 100,
               'tgtrev' => 234,
               'progrev' => 234,
               'achrev' => 234,
               'created_at' => now(),
               'updated_at' => now()
            ],
            [
               'id_jenis' => 2,
               'id_nama_produk' =>1,
               'witel' => 'PEKAN BARU',
               'tgtmtd' => 2447,
               'realmtd' => 193,
               'ach' => 0,
               'shrtge' => 100,
               'tgtrev' => 234,
               'progrev' => 234,
               'achrev' => 234,
               'created_at' => now(),
               'updated_at' => now()
            ],
            [
               'id_jenis' => 2,
               'id_nama_produk' =>1,
               'witel' => 'KARAWANG',
               'tgtmtd' => 2447,
               'realmtd' => 193,
               'ach' => 0,
               'shrtge' => 100,
               'tgtrev' => 234,
               'progrev' => 234,
               'achrev' => 234,
               'created_at' => now(),
               'updated_at' => now()
            ],

         ]);  
    }
}
