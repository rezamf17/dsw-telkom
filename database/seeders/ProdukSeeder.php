<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('kelola_produk')->insert([
            [
               'id_jenis' => 2,
               'id_nama_produk' =>1,
               'witel' => 'BANDUNG',
               'tgt' => 2447,
               'psbln' => 193,
               'ach' => 0,
               'rank' => 1,
               'tgtrev' => 234,
               'progrev' => 234,
               'achrev' => 234,
               'rankrev' => 3,
               'created_at' => now(),
               'updated_at' => now()

            ],
            [
               'id_jenis' => 2,
               'id_nama_produk' =>1,
               'witel' => 'BANDUNG BRT',
               'tgt' => 2447,
               'psbln' => 193,
               'ach' => 0,
               'rank' => 1,
               'tgtrev' => 234,
               'progrev' => 234,
               'achrev' => 234,
               'rankrev' => 3,
               'created_at' => now(),
               'updated_at' => now()

            ],
            [
               'id_jenis' => 2,
               'id_nama_produk' =>1,
               'witel' => 'BANDUNG',
               'tgt' => 2447,
               'psbln' => 193,
               'ach' => 0,
               'rank' => 1,
               'tgtrev' => 234,
               'progrev' => 234,
               'achrev' => 234,
               'rankrev' => 3,
               'created_at' => now(),
               'updated_at' => now()
            ],
            [
               'id_jenis' => 2,
               'id_nama_produk' =>1,
               'witel' => 'CIMAHI',
               'tgt' => 2447,
               'psbln' => 193,
               'ach' => 0,
               'rank' => 1,
               'tgtrev' => 234,
               'progrev' => 234,
               'achrev' => 234,
               'rankrev' => 3,
               'created_at' => now(),
               'updated_at' => now()
            ],
            [
               'id_jenis' => 2,
               'id_nama_produk' =>1,
               'witel' => 'TASIKMALAYA',
               'tgt' => 2447,
               'psbln' => 193,
               'ach' => 0,
               'rank' => 1,
               'tgtrev' => 234,
               'progrev' => 234,
               'achrev' => 234,
               'rankrev' => 3,
               'created_at' => now(),
               'updated_at' => now()
            ],
            [
               'id_jenis' => 2,
               'id_nama_produk' =>1,
               'witel' => 'CIREBON',
               'tgt' => 2447,
               'psbln' => 193,
               'ach' => 0,
               'rank' => 1,
               'tgtrev' => 234,
               'progrev' => 234,
               'achrev' => 234,
               'rankrev' => 3,
               'created_at' => now(),
               'updated_at' => now()
            ],
            [
               'id_jenis' => 2,
               'id_nama_produk' =>1,
               'witel' => 'KARAWANG',
               'tgt' => 2447,
               'psbln' => 193,
               'ach' => 0,
               'rank' => 1,
               'tgtrev' => 234,
               'progrev' => 234,
               'achrev' => 234,
               'rankrev' => 3,
               'created_at' => now(),
               'updated_at' => now()
            ],

         ]);    
     }
}
