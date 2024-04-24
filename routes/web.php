<?php

use App\Http\Controllers\KedudukanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\Recruitment;
use App\Http\Controllers\RecruitmentController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/webconfig', [App\Http\Controllers\WebConfigController::class, 'index'])->name('webconfig');
Route::post('/simpanwebconfig', [App\Http\Controllers\WebConfigController::class, 'simpanwebconfig'])->name('simpanwebconfig');

Route::get('/dataproduk', [App\Http\Controllers\ProdukController::class, 'index'])->name('dataproduk');

Route::get('/datapegawai', [App\Http\Controllers\PegawaiController::class, 'index'])->name('datapegawai');
Route::post('/tambahdatapegawai', [App\Http\Controllers\PegawaiController::class, 'tambahdata_pegawai'])->name('tambahdatapegawai');
Route::delete('/hapuspegawai/{id_pegawai}', [App\Http\Controllers\PegawaiController::class, 'hapuspegawai'])->name('hapuspegawai.destroy');
Route::get('/edit_pegawai/{id}', [App\Http\Controllers\PegawaiController::class, 'edit'])->name('Pegawai.edit');
Route::patch('/update_pegawai/{id}', [PegawaiController::class, "update"])->name("Pegawai.update");

Route::resource('Kedudukan', KedudukanController::class);

Route::get("/datarecruitment", [RecruitmentController::class, 'index'])->name("Recruitment.index");
Route::post("/tambahrecruitment", [RecruitmentController::class, 'tambah'])->name("Recruitment.tambah");
Route::get("/editrecruitment/{id}", [RecruitmentController::class, 'edit'])->name("Recruitment.edit");
Route::patch("/updaterecruitment/{id}", [RecruitmentController::class, 'update'])->name("Recruitment.update");
Route::delete("/hapusrecruitment/{id}", [RecruitmentController::class, 'delete'])->name("Recruitment.delete");



Route::get("/dataportofolio", [PortofolioController::class, 'index'])->name("Portofolio.index");
Route::post("/tambahportofolio", [PortofolioController::class, 'tambah'])->name("Portofolio.tambah");
Route::get("/editportofolio/{id}", [PortofolioController::class, 'edit'])->name("Portofolio.edit");
Route::patch("/updateportofolio/{id}", [PortofolioController::class, 'update'])->name("Portofolio.update");
Route::delete("/hapusportofolio/{id}", [PortofolioController::class, 'delete'])->name("Portofolio.delete");

Route::get("/datapelatihan", [PelatihanController::class, 'index'])->name("Pelatihan.index");
Route::post("/tambahpelatihan", [PelatihanController::class, 'tambah'])->name("Pelatihan.tambah");
Route::get("/editpelatihan/{id}", [PelatihanController::class, 'edit'])->name("Pelatihan.edit");
Route::patch("/updatepelatihan/{id}", [PelatihanController::class, 'update'])->name("Pelatihan.update");
Route::delete("/hapuspelatihan/{id}", [PelatihanController::class, 'delete'])->name("Pelatihan.delete");

// routes/web.php

// Route::delete('/hapuskedudukan/{id_pegawai}', 'PegawaiController@hapuspegawai');



// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


