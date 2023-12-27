<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Admin;
use App\Models\pakar;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    function Index(){
        return view("Pengguna/login");
    }

    function Login(Request $request){

        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];


        //Login sbg User
        if (Auth::guard('user')->attempt($infologin)){
            //User masuk ke beranda

            $userNama = User::select('nama')
            ->where('email', $infologin['email'])
            ->first();

            $userUmur = User::select('umur')
            ->where('email', $infologin['email'])
            ->first();

            self::CreateSession($request, 'user', $request->email, $userNama);

            $request->session()->put('umur', $userUmur);

            return redirect()->route('beranda');
        }
        //Login sebagai Admin
        else if (Auth::guard('admin')->attempt($infologin)){
            //Admin masuk ke halaman ---

            $userNama = Admin::select('nama')
            ->where('email', $infologin['email'])
            ->first();

            self::CreateSession($request, 'admin', $request->email, $userNama);
            return redirect()->route('beranda');
        }
        //Login sebagai Pakar
        else if (Auth::guard('pakar')->attempt($infologin)){
            //Pakar masuk ke halaman ---

            $userNama = pakar::select('nama')
            ->where('email', $infologin['email'])
            ->first();

            self::CreateSession($request, 'pakar', $request->email, $userNama);
            return redirect()->route('beranda');
        }
        //Login tidak berhasil
        else{
            //Jika autentikasi gagal
            return redirect('login')->withErrors('login-error','Username dan Password yang dimasukkan tidak valid');
        }
    }

    function Logout(Request $request){
        if (Auth::guard('user')->check()){
            $request->session()->forget('email');
            Auth::guard('user')->logout();
            $request->session()->forget('user');
            $request->session()->forget('nama');
            $request->session()->forget('umur');
        }
        else if (Auth::guard('admin')->check()){
            $request->session()->forget('email');
            Auth::guard('admin')->logout();
            $request->session()->forget('admin');
            $request->session()->forget('nama');
        }
        else if (Auth::guard('pakar')->check()){
            $request->session()->forget('email');
            Auth::guard('pakar')->logout();
            $request->session()->forget('pakar');
            $request->session()->forget('nama');
        }

        return redirect()->route('beranda');
    }

    function Register(Request $request){

        //Memvalidasi dahulu nilai-nilai dri Request
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ],[
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
            'umur.required' => 'Umur wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'no_hp.required' => 'Nomor Hp wajib diisi',
        ]
        );


        //Memasukkan data baru ke dalam Table User
        $user = new User;
        $user->nama = $validated['nama'];
        $user->umur = $validated['umur'];
        $user->alamat = $validated['alamat'];
        $user->nomor_hp = $validated['no_hp'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        //Melakukan Login pada Akun tersebut
        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        //Login
        if (Auth::guard('user')->attempt($infologin)){
            //User masuk ke beranda

            $userNama = User::select('nama')
            ->where('email', $infologin['email'])
            ->first();

            $userUmur = User::select('umur')
            ->where('email', $infologin['email'])
            ->first();

            $request->session()->put('umur', $userUmur);

            self::CreateSession($request, 'user', $request->email, $userNama);
            return redirect()->route('beranda');
        }
        else{
            return redirect('login');
        }
    }

    function CreateSession(Request $request, $levelUser, $email, $nama){

        $request->session()->put('email_tahan', $email);
        $request->session()->put('nama', $nama);

        if ($levelUser == "user"){
            $request->session()->put('user', $levelUser);
        }
        else if ($levelUser == "admin"){
            $request->session()->put('admin', $levelUser);
        }
        else if ($levelUser == "pakar"){
            $request->session()->put('pakar', $levelUser);
        }
    }
}
