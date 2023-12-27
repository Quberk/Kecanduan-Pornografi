<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hasil;

class AdminController extends Controller
{
    public function Index(){
        self::CheckingUserType();
    }

    //Cek apakah tipe user yang login sesuai
    function CheckingUserType(){
        if (!session()->has('admin')){
            return redirect('login');
        }
    }

    public function KelolaUser(){
        self::CheckingUserType();

        $user = User::all();

        return view('Admin.kelola_user', compact(['user']));
    }

    public function KelolaHistoriDiagnosa(){
        self::CheckingUserType();

        $hasil = Hasil::all();

        return view('Admin.histori_diagnosa', compact(['hasil']));
    }
}
