<?php

namespace App\Http\Controllers\UserControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Gejala;
use App\Models\Hasil;
use Illuminate\Support\Facades\DB;

class KonsultasiController extends Controller
{
    public function Index(){
        if (!session()->has('user')){
            return redirect('login');
        }

        $gejala = Gejala::all();

        return view('User.konsultasi');
    }

    public function getPertanyaan(){
        $dataPertanyaan = Gejala::pluck('pertanyaan');
        $dataKodeGejala = Gejala::pluck('kode_gejala');
        $dataNamaGejala = Gejala::pluck('nama_gejala');
        $dataCf = Gejala::pluck('nilai_cf');
        $data = [$dataPertanyaan, $dataKodeGejala, $dataNamaGejala, $dataCf];
        return response()->json($data);
    }

    public function store(Request $request){
        //Hasil::create($request->except(['_token', 'submit']));

        $validated = $request->validate([
            'email' => 'required',
            'nama' => 'required',
            'kepastian' => 'required',
            'tingkat_kecanduan' => 'required'
        ]
        );

        $data = new Hasil();
        $data->email = $validated['email'];
        $data->nama = $validated['nama'];
        $data->kepastian = $validated['kepastian'];
        $data->tingkat_kecanduan = $validated['tingkat_kecanduan'];

        $data->save();
    }

    public function hasilDiagnosa(Request $request)
    {
        $email = $request->query('email');
        $nama = $request->query('nama');
        $kepastian = $request->query('kepastian');
        $tingkatKecanduan = $request->query('tingkat_kecanduan');

        // Lakukan pengolahan data sesuai kebutuhan

        return view('User.hasil_diagnosa', [
            'email' => $email,
            'nama' => $nama,
            'kepastian' => $kepastian,
            'tingkatKecanduan' => $tingkatKecanduan,
        ]);
    }

}
