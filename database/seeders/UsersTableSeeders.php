<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'nama'=>'Marten',
            'umur'=>16,
            'alamat'=>'Sudiang',
            'nomor_hp'=>'0893432',
            'email'=>'marten@gmail.com',
            'password'=>Hash::make('1234')
        ]);
    }
}
