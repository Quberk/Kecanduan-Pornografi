<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaidahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table_kaidah')->insert([[
            'no'=>'R1',
            'kaidah_aturan'=>'IF G1 AND G2 THEN KK1'
        ]
        ,
        [
            'no'=>'R2',
            'kaidah_aturan'=>'IF G1 AND G2 AND G3 THEN KK1'
        ],
        [
            'no'=>'R3',
            'kaidah_aturan'=>'IF G1 AND G2 AND G3 AND G4 THEN KK1'
        ]
        ]);
    }
}
