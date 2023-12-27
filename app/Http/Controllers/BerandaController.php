<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {

        if (session()->has('admin')){
            return view('Admin/beranda_admin');
        }
        else if (session()->has('user')){
            return view('beranda');
        }
        else if (session()->has('pakar')){
            return view('Pakar/beranda_pakar');
        }
        else{
            return view('beranda');
        }

    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
