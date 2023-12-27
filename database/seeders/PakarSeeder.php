<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PakarSeeder extends Seeder
{
    //Database Seeder
    public function run()
    {
        DB::table('pakar')->insert([
            'nama'=>'Sule',
            'nomor_hp'=>'0893432',
            'pengalaman'=>'Dokter selamat 3 tahun',
            'email'=>'pakar1@gmail.com',
            'password'=>Hash::make('1234')
        ]);
    }
}
