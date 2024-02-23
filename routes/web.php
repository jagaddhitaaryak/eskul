<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\SiswaController::class, 'home'])->name('home');


Route::get('/waka_dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('index')->middleware('role:1');
Route::get('/daftarEkskul', [App\Http\Controllers\AdminController::class, 'daftarEkskul'])->name('daftarEkskul')->middleware('role:1');
Route::post('/hapusEkskulWaka/{id}', [App\Http\Controllers\AdminController::class, 'hapusEkskulWaka'])->name('hapusEkskulWaka')->middleware('role:1');
Route::get('/listPenggunaAdmin', [App\Http\Controllers\AdminController::class, 'list'])->name('listPenggunaAdmin')->middleware('role:1');
Route::get('/detailNilaiPenggunaAdmin/{id}', [App\Http\Controllers\AdminController::class, 'detailNilai'])->name('detailNilaiPenggunaAdmin')->middleware('role:1');
Route::get('/tambahPeriode', [App\Http\Controllers\AdminController::class, 'tambahPeriode'])->name('tambahPeriode')->middleware('role:1');
Route::get('/createEkskulAdmin', [App\Http\Controllers\AdminController::class, 'create'])->name('createEkskulAdmin')->middleware('role:1');
Route::post('/insertPeriode', [App\Http\Controllers\AdminController::class, 'insertPeriode'])->name('insertPeriode')->middleware('role:1');
Route::post('/insertEkskulAdmin', [App\Http\Controllers\AdminController::class, 'store'])->name('insertEkskulAdmin')->middleware('role:1');
Route::get('/showEskulAdmin/{id}', [App\Http\Controllers\AdminController::class, 'show'])->name('showEskulAdmin')->middleware('role:1');
Route::get('/editEskulAdmin/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('editEskulAdmin')->middleware('role:1');
Route::post('/updateEskulAdmin/{id}', [App\Http\Controllers\AdminController::class, 'updateEkskul'])->name('updateEskulAdmin')->middleware('role:1');
Route::get('/tambahPengguna', [App\Http\Controllers\AdminController::class, 'tambahPengguna'])->name('tambahPengguna')->middleware('role:1');
Route::post('/insertPengguna', [App\Http\Controllers\AdminController::class, 'insertPengguna'])->name('insertPengguna')->middleware('role:1');
Route::get('/editPengguna/{id}', [App\Http\Controllers\AdminController::class, 'editPengguna'])->name('editPengguna')->middleware('role:1');
Route::post('/updatePengguna/{id}', [App\Http\Controllers\AdminController::class, 'updatePengguna'])->name('updatePengguna')->middleware('role:1');
Route::get('/perbaruiAkun/{id}', [App\Http\Controllers\AdminController::class, 'perbaruiAkun'])->name('perbaruiAkun')->middleware('role:1');
Route::post('/hapusAkun/{id}', [App\Http\Controllers\AdminController::class, 'hapusAkun'])->name('hapusAkun')->middleware('role:1');



Route::get('/pembina_dashboard', [App\Http\Controllers\PembinaController::class, 'index'])->name('indexPembina')->middleware('role:2');
Route::get('/list_ekskul_pembina', [App\Http\Controllers\PembinaController::class, 'create'])->name('list_ekskul_pembina')->middleware('role:2');
Route::get('/list_anggota_pembina', [App\Http\Controllers\PembinaController::class, 'listAnggota'])->name('list_anggota_pembina')->middleware('role:2');
Route::get('/tambah_anggota_pembina', [App\Http\Controllers\PembinaController::class, 'tambahAnggota'])->name('tambah_anggota_pembina')->middleware('role:2');
Route::post('/update_ketua_pembina', [App\Http\Controllers\PembinaController::class, 'updateKetua'])->name('update_ketua_pembina')->middleware('role:2');
Route::get('/detailEskulPembina/{id}', [App\Http\Controllers\PembinaController::class, 'detail'])->name('detailEskulPembina')->middleware('role:2');
Route::get('/editEskulPembina/{id}', [App\Http\Controllers\PembinaController::class, 'edit'])->name('editEskulPembina')->middleware('role:2');
Route::post('/updateEskulPembina/{id}', [App\Http\Controllers\PembinaController::class, 'update'])->name('updateEskulPembina')->middleware('role:2');
Route::get('/detailAnggotaPembina/{user_id}/{ekskul_id}', [App\Http\Controllers\PembinaController::class, 'detailAnggota'])->name('detailAnggotaPembina')->middleware('role:2');
Route::post('/updateNilaiAnggotaPembina/{user_id}/{ekskul_id}/{periode_id}', [App\Http\Controllers\PembinaController::class, 'updateNilaiAnggota'])->name('updateNilaiAnggotaPembina')->middleware('role:2');
Route::get('/editAnggotaPembina/{user_id}/{ekskul_id}', [App\Http\Controllers\PembinaController::class, 'editAnggota'])->name('editAnggotaPembina')->middleware('role:2');


Route::get('/ketua_dashboard', [App\Http\Controllers\KetuaController::class, 'index'])->name('indexKetua')->middleware('role:3');
Route::get('/pendaftar', [App\Http\Controllers\KetuaController::class, 'pendaftar'])->name('pendaftar')->middleware('role:3');
Route::post('/terimaPendaftar/{user_id}/{ekskul_id}', [App\Http\Controllers\KetuaController::class, 'terimaPendaftar'])->name('terimaPendaftar')->middleware('role:3');
Route::post('/tolakPendaftar/{user_id}/{ekskul_id}', [App\Http\Controllers\KetuaController::class, 'tolakPendaftar'])->name('tolakPendaftar')->middleware('role:3');
Route::get('/tambahAnggota', [App\Http\Controllers\KetuaController::class, 'tambahAnggota'])->name('tambahAnggota')->middleware('role:3');
Route::post('/insertAnggotaKetua', [App\Http\Controllers\KetuaController::class, 'insertAnggotaKetua'])->name('insertAnggotaKetua')->middleware('role:3');
Route::get('/absenAnggota', [App\Http\Controllers\KetuaController::class, 'absenAnggota'])->name('absenAnggota')->middleware('role:3');
Route::post('/kirimAbsen', [App\Http\Controllers\KetuaController::class, 'kirimAbsen'])->name('kirimAbsen')->middleware('role:3');
Route::get('/riwayatAbsen', [App\Http\Controllers\KetuaController::class, 'riwayatAbsen'])->name('riwayatAbsen')->middleware('role:3');
Route::get('/daftarAnggota', [App\Http\Controllers\KetuaController::class, 'daftarAnggota'])->name('daftarAnggota')->middleware('role:3');
Route::get('/detailAnggotaKetua/{user_id}/{ekskul_id}', [App\Http\Controllers\KetuaController::class, 'detailAnggotaKetua'])->name('detailAnggotaKetua')->middleware('role:3');
Route::get('/laporanAbsen', [App\Http\Controllers\KetuaController::class, 'laporanAbsen'])->name('laporanAbsen')->middleware('role:3');
Route::get('/perbaruiAkunKetua', [App\Http\Controllers\KetuaController::class, 'perbaruiAkunKetua'])->name('perbaruiAkunKetua')->middleware('role:3');


Route::get('/guru_dashboard', [App\Http\Controllers\GuruController::class, 'index'])->name('indexGuru')->middleware('role:4');

Route::get('/siswa_dashboard', [App\Http\Controllers\SiswaController::class, 'index'])->name('indexSiswa')->middleware('role:5');
Route::get('/detailEkskulSiswa/{id}', [App\Http\Controllers\SiswaController::class, 'detailEkskulSiswa'])->name('detailEkskulSiswa')->middleware('role:5');

Route::get('/eskul', [App\Http\Controllers\SiswaController::class, 'eskul'])->name('eskul');
Route::get('/detail/{id}', [App\Http\Controllers\SiswaController::class, 'detail_eskul'])->name('detail_eskul');
Route::get('/daftar/{id}', [App\Http\Controllers\HomeController::class, 'daftar'])->name('daftar');
Route::post('/join', [App\Http\Controllers\HomeController::class, 'join'])->name('join');
