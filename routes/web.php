<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\administrator;
use App\Http\Controllers\alat;
use App\Http\Controllers\halamanController;
use App\Http\Controllers\kuisionerController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\labController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LaporanKerusakanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\peminjamanAlat;
use App\Http\Controllers\peminjamanLab;
use App\Http\Controllers\PengembalianAlatController;
use App\Http\Controllers\pengembalianLab;
use App\Http\Controllers\PerawatanLabController;
use App\Http\Controllers\PerbaikanAlatController;
use App\Http\Controllers\prodi;
use App\Http\Controllers\sliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use App\Models\kuisioner;
use App\Models\pengembalianAlat;

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


Route::get('/dashboard', [dashboard::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/proseslogin', [LoginController::class, 'proseslogin']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/lab', [labController::class, 'index'])->name('lab')->middleware('auth');
Route::get('/tambahlab', [labController::class, 'tambah'])->name('tambahlab')->middleware('auth');
Route::post('/prosestambahlab', [labController::class, 'prosestambahlab'])->middleware('auth');
Route::get('/editlab/{id}', [labController::class, 'edit'])->name('editlab')->middleware('auth');
Route::post('/updatelab/{id}', [labController::class, 'update'])->name('updatelab')->middleware('auth');
Route::delete('/hapuslab/{id}', [labController::class, 'hapus'])->name('hapuslab')->middleware('auth');
Route::get('/detaillab/{id}', [labController::class, 'detail'])->name('detaillab')->middleware('auth');

Route::get('/administrator', [administrator::class, 'index'])->name('administrator')->middleware('auth');
Route::get('/tambahadmin', [administrator::class, 'tambahadmin'])->name('tambahadmin')->middleware('auth');
Route::post('/prosestambahadmin', [administrator::class, 'prosestambahadmin'])->middleware('auth');
Route::get('/editadministrator/{id}', [administrator::class, 'edit'])->name('editadministrator')->middleware('auth');
Route::post('/updateadministrator/{id}', [administrator::class, 'update'])->name('updateadministrator')->middleware('auth');
Route::delete('/hapusadministrator/{id}', [administrator::class, 'hapus'])->name('hapusadministrator')->middleware('auth');
Route::get('/detailadministrator/{id}', [administrator::class, 'detail'])->name('detailadministrator')->middleware('auth');


Route::get('/prodi', [prodi::class, 'index'])->name('prodi')->middleware('auth');
Route::get('/tambahprodi', [prodi::class, 'tambah'])->name('tambahprodi')->middleware('auth');
Route::post('/prosestambahprodi', [prodi::class, 'prosestambah'])->middleware('auth');
Route::get('/editprodi/{id}', [prodi::class, 'edit'])->name('editprodi')->middleware('auth');
Route::post('/updateprodi/{id}', [prodi::class, 'update'])->name('updateprodi')->middleware('auth');
Route::delete('/hapusprodi/{id}', [prodi::class, 'hapus'])->name('hapusprodi')->middleware('auth');
Route::get('/detailprodi/{id}', [prodi::class, 'detail'])->name('detailprodi')->middleware('auth');

Route::get('/alat', [alat::class, 'index'])->name('alat')->middleware('auth');
Route::get('/tambahalat', [alat::class, 'tambah'])->name('tambahalat')->middleware('auth');
Route::post('/prosestambahalat', [alat::class, 'prosestambah'])->middleware('auth');
Route::get('/editalat/{id}', [alat::class, 'edit'])->name('editalat')->middleware('auth');
Route::post('/updatealat/{id}', [alat::class, 'update'])->name('updatealat')->middleware('auth');
Route::delete('/hapusalat/{id}', [alat::class, 'hapus'])->name('hapusalat')->middleware('auth');
Route::get('/detailalat/{id}', [alat::class, 'detail'])->name('detailalat')->middleware('auth');

Route::get('/slider', [sliderController::class, 'index'])->name('slider')->middleware('auth');
Route::get('/tambahslider', [sliderController::class, 'tambahslider'])->name('tambahslider')->middleware('auth');
Route::post('/prosestambahslider', [sliderController::class, 'prosestambahslider'])->middleware('auth');
Route::get('/editslider/{id}', [sliderController::class, 'edit'])->name('editslider')->middleware('auth');
Route::post('/updateslider/{id}', [sliderController::class, 'update'])->name('updateslider')->middleware('auth');
Route::delete('/hapusslider/{id}', [sliderController::class, 'hapus'])->name('hapusslider')->middleware('auth');

Route::get('/pertanyaan', [kuisionerController::class, 'index'])->name('pertanyaan')->middleware('auth');
Route::get('/tambahpertanyaan', [kuisionerController::class, 'tambahpertanyaan'])->name('tambahpertanyaan')->middleware('auth');
Route::post('/prosestambahpertanyaan', [kuisionerController::class, 'prosestambahpertanyaan'])->middleware('auth');
Route::get('/editpertanyaan/{id}', [kuisionerController::class, 'edit'])->name('editpertanyaan')->middleware('auth');
Route::post('/updatepertanyaan/{id}', [kuisionerController::class, 'update'])->name('updatepertanyaan')->middleware('auth');
Route::delete('/hapuspertanyaan/{id}', [kuisionerController::class, 'hapus'])->name('hapuspertanyaan')->middleware('auth');

Route::get('/kritiksaran', [kuisionerController::class, 'kritiksaran'])->name('kritiksaran')->middleware('auth');
Route::delete('/hapuskritik/{id}', [kuisionerController::class, 'hapuskritik'])->name('hapuskritik')->middleware('auth');

Route::get('/peminjamanlab', [peminjamanLab::class, 'index'])->name('peminjamanlab')->middleware('auth');
Route::post('/peminjamanlab', [peminjamanLab::class, 'store'])->name('peminjamanlab-store')->middleware('auth');
Route::get('/formPeminjamanlab', [peminjamanLab::class, 'create'])->name('formPeminjamanlab')->middleware('auth');
Route::get('/konfirmasipeminjaman/{id}', [peminjamanLab::class, 'konfirmasi'])->name('konfirmasipeminjaman')->middleware('auth');
Route::get('/terimalab/{id}', [peminjamanLab::class, 'terima'])->name('terimalab')->middleware('auth');
Route::get('/peminjamanAlat', [peminjamanAlat::class, 'index'])->name('peminjamanalat')->middleware('auth');
Route::get('/konfirmasipeminjamanalat/{id}', [peminjamanAlat::class, 'konfirmasi'])->name('konfirmasipeminjamanalat')->middleware('auth');
Route::get('/terima/{id}', [peminjamanAlat::class, 'terima'])->name('terimaalat')->middleware('auth');
Route::get('/pengembalianLab', [pengembalianLab::class, 'index'])->name('pengembalianlab')->middleware('auth');
Route::get('/pengembalianAlat', [PengembalianAlatController::class, 'index'])->name('pengembalianalat')->middleware('auth');

Route::get('/perawatan', [PerawatanLabController::class, 'index'])->name('perawatan')->middleware('auth');
Route::get('/tambahperawatan', [PerawatanLabController::class, 'tambah'])->name('tambahperawatan')->middleware('auth');
Route::post('/prosestambahperawatan', [PerawatanLabController::class, 'prosestambahperawatan'])->middleware('auth');
Route::get('/editperawatan/{id}', [PerawatanLabController::class, 'edit'])->name('editperawatan')->middleware('auth');
Route::post('/updateperawatan/{id}', [PerawatanLabController::class, 'update'])->name('updateperawatan')->middleware('auth');
Route::delete('/hapusperawatan/{id}', [PerawatanLabController::class, 'hapus'])->name('hapusperawatan')->middleware('auth');
Route::get('/konfirmasi/{id}', [PerawatanLabController::class, 'konfirmasi'])->name('konfirmasi')->middleware('auth');
Route::post('/konfirmasip/{id}', [PerawatanLabController::class, 'konfirmasip'])->name('konfirmasip')->middleware('auth');
Route::post('/batalperawatan/{id}', [PerawatanLabController::class, 'batalperawatan'])->name('batalperawatan')->middleware('auth');

Route::get('/kerusakan', [LaporanKerusakanController::class, 'index'])->name('kerusakan')->middleware('auth');
Route::get('/tambahkerusakan', [LaporanKerusakanController::class, 'tambah'])->name('tambahkerusakan')->middleware('auth');
Route::post('/prosestambahkerusakan', [LaporanKerusakanController::class, 'prosestambahkerusakan'])->middleware('auth');
Route::get('/editkerusakan/{id}', [LaporanKerusakanController::class, 'edit'])->name('editkerusakan')->middleware('auth');
Route::post('/updatekerusakan/{id}', [LaporanKerusakanController::class, 'update'])->name('updatekerusakan')->middleware('auth');
Route::delete('/hapuskerusakan/{id}', [LaporanKerusakanController::class, 'hapus'])->name('hapuskerusakan')->middleware('auth');

Route::get('/perbaikanalat', [PerbaikanAlatController::class, 'index'])->name('perbaikanalat')->middleware('auth');
Route::get('/tambahperbaikanalat', [perbaikanAlatController::class, 'tambah'])->name('tambahperbaikanalat')->middleware('auth');
Route::post('/prosestambahperbaikanalat', [PerbaikanAlatController::class, 'prosestambahperbaikanalat'])->middleware('auth');
Route::get('/editperbaikanalat/{id}', [PerbaikanAlatController::class, 'edit'])->name('editperbaikanalat')->middleware('auth');
Route::post('/updateperbaikanalat/{id}', [PerbaikanAlatController::class, 'update'])->name('updateperbaikanalat')->middleware('auth');
Route::delete('/hapusperbaikanalat/{id}', [PerbaikanAlatController::class, 'hapus'])->name('hapusperbaikanalat')->middleware('auth');

Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan')->middleware('auth');
Route::post('/laporan', [LaporanController::class, 'grouping'])->name('grouping')->middleware('auth');
Route::get('/laporanPerawatan', [LaporanController::class, 'lperawatan'])->name('lperawatan')->middleware('auth');
Route::post('/laporanPerawatan', [LaporanController::class, 'lgrouping'])->name('lgrouping')->middleware('auth');
