<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Authentication\SessionController;
use App\Http\Controllers\UserControllers\KonsultasiController;
use App\Http\Controllers\PakarControllers\KelolaGejalaController;
use App\Http\Controllers\PakarControllers\KelolaKaidahController;
use App\Http\Controllers\AdminControllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//====================Landing Page================================
Route::get('/', function () {
    return redirect()->route('beranda');
});

//-------------------------Mengambil semua data Session====================
Route::get('/session', function () {

    $sessionEmail = session('email_tahan');
    $sessionNama = session('nama');
    $sessionUmur = session('umur');

    return response()->json([
        'session_email' => $sessionEmail,
        'session_nama' => $sessionNama,
        'session_umur' => $sessionUmur
    ]);
});

//========================Beranda=========================================

Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');

//=========================Users Page=========================================

Route::get('user/konsultasi', [KonsultasiController::class, 'Index'])->name('konsultasi');
Route::get('user/getPertanyaan', [KonsultasiController::class, 'getPertanyaan'])->name('getPertanyaan');
Route::post('user/postJawaban', [KonsultasiController::class, 'getPertanyaan'])->name('postJawaban');
Route::post('user/store-data', [KonsultasiController::class, 'store']);
Route::get('/user/hasilDiagnosa', [KonsultasiController::class, 'hasilDiagnosa'])->name('hasilDiagnosa');


//==================Pakar page====================================

//------Kelola Gejala---------
Route::get('pakar/kelolagejala', [KelolaGejalaController::class, 'Index'])->name('kelolagejala');
//Edit
Route::get('pakar/{id}/editGejala', [KelolaGejalaController::class, 'EditData']);
Route::put('pakar/{id}', [KelolaGejalaController::class, 'UpdateData']);
Route::delete('pakar/{id}', [KelolaGejalaController::class, 'DeleteData']);
//Create
Route::get('pakar/createGejala', [KelolaGejalaController::class, 'CreateData'])->name('createGejala');
Route::post('/pakar/postCreateGejala', [KelolaGejalaController::class, 'PostCreateData'])->name('postCreateGejala');

//------Kelola Kaidah---------
Route::get('pakar/kelolaKaidah', [KelolaKaidahController::class, 'Index'])->name('kelolaKaidah');
//Create
Route::get('pakar/createKaidah', [KelolaKaidahController::class, 'CreateData'])->name('createKaidah');
Route::post('/pakar/postCreateKaidah', [KelolaKaidahController::class, 'PostCreateData'])->name('postCreateKaidah');
//Edit
Route::get('pakar/{id}/editKaidah', [KelolaKaidahController::class, 'EditData']);
Route::put('pakar/{id}/kaidah', [KelolaKaidahController::class, 'UpdateData']);
Route::delete('pakar/{id}/kaidah', [KelolaKaidahController::class, 'DeleteData']);


//===============================Admin Page======================================

Route::get('admin/kelolaUser', [AdminController::class, 'KelolaUser'])->name('kelolaUser');
Route::get('admin/kelolaHistoriDiagnosa', [AdminController::class, 'KelolaHistoriDiagnosa'])->name('kelolaHistoriDiagnosa');


//======================================Session Controller===================================

Route::get('/login', [SessionController::class, 'Index'])->name('login');
Route::post('/postLogin', [SessionController::class, 'Login'])->name('postLogin');
Route::post('/postLogout', [SessionController::class, 'Logout'])->name('postLogout');
Route::post('/postRegister', [SessionController::class, 'Register'])->name('postRegister');
