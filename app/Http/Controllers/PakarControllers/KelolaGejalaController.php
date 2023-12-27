<?php

namespace App\Http\Controllers\PakarControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gejala;

class KelolaGejalaController extends Controller
{
    public function Index(){

        self::CheckingUserType();

        $gejala = Gejala::all();

        return view('Pakar.kelola_gejala', compact(['gejala']));
    }

    //Cek apakah tipe user yang login sesuai
    function CheckingUserType(){
        if (!session()->has('pakar')){
            return redirect('login');
        }
    }

    public function CreateData(){
        return view('Pakar.create_gejala');
    }

    public function PostCreateData(Request $request){
        Gejala::create($request->except(['_token', 'submit']));
        return redirect()->route('kelolagejala');
    }

    public function EditData($id){
        $gejala = Gejala::find($id);
        return view('Pakar.edit_gejala', compact(['gejala']));
    }

    public function UpdateData($id, Request $request){
        $gejala = Gejala::find($id);
        $gejala->update($request->except(['_token', 'submit']));
        return redirect()->route('kelolagejala');
    }

    public function DeleteData($id){
        $gejala = Gejala::find($id);
        $gejala->delete();
        return redirect()->route('kelolagejala');
    }
}
