<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gejala')->insert([[
            'kode_gejala'=>'G1',
            'nama_gejala'=>'Enggan Belajar',
            'pertanyaan'=>'Apakah anda enggan belajar?',
            'nilai_cf'=>0.4
        ]
        ,
        [
            'kode_gejala'=>'G2',
            'nama_gejala'=>'Enggan Lepas dari Gadgetnya',
            'pertanyaan'=>'Apakah anda sulit untuk lepas dari Gadget?',
            'nilai_cf'=>0.6
        ],
        [
            'kode_gejala'=>'G3',
            'nama_gejala'=>'Senang menyendiri terutama di kamarnya',
            'pertanyaan'=>'Apakah anda senang menyendiri di kamar?',
            'nilai_cf'=>0.4
        ]
        ]);
    }
}
