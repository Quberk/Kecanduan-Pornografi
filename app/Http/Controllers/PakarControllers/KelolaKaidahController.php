<?php

namespace App\Http\Controllers\PakarControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kaidah;

class KelolaKaidahController extends Controller
{
    public function Index(){

        self::CheckingUserType();

        $kaidah = Kaidah::all();

        return view('Pakar.kelola_kaidah_aturan', compact(['kaidah']));
    }

    //Cek apakah tipe user yang login sesuai
    function CheckingUserType(){
        if (!session()->has('pakar')){
            return redirect('login');
        }
    }

    public function CreateData(){
        return view('Pakar.create_kaidah');
    }

    public function PostCreateData(Request $request){
        Kaidah::create($request->except(['_token', 'submit']));
        return redirect()->route('kelolaKaidah');
    }

    public function EditData($id){
        $kaidah = Kaidah::find($id);
        return view('Pakar.edit_kaidah', compact(['kaidah']));
    }

    public function UpdateData($id, Request $request){
        $kaidah = Kaidah::find($id);
        $kaidah->update($request->except(['_token', 'submit']));
        return redirect()->route('kelolaKaidah');
    }

    public function DeleteData($id){
        $kaidah = Kaidah::find($id);
        $kaidah->delete();
        return redirect()->route('kelolaKaidah');
    }

}
