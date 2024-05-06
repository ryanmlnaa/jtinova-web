<?php

use App\Http\Controllers\BenefitController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KeahlianController;
use App\Http\Controllers\KedudukanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\Recruitment;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserDashboardController;
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

Route::resource('Jabatan', JabatanController::class);

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

Route::get("/databenefit", [BenefitController::class, 'index'])->name("Benefit.index");
Route::post("/tambahbenefit", [BenefitController::class, 'tambah'])->name("Benefit.tambah");
Route::get("/editbenefit/{id}", [BenefitController::class, 'edit'])->name("Benefit.edit");
Route::patch("/updatebenefit/{id}", [BenefitController::class, 'update'])->name("Benefit.update");
Route::delete("/hapusbenefit/{id}", [BenefitController::class, 'delete'])->name("Benefit.delete");

Route::get("/datakeahlian", [KeahlianController::class, 'index'])->name("Keahlian.index");
Route::post("/tambahkeahlian", [keahlianController::class, 'tambah'])->name("Keahlian.tambah");
Route::get("/editkeahlian/{id}", [keahlianController::class, 'edit'])->name("Keahlian.edit");
Route::patch("/updatekeahlian/{id}", [keahlianController::class, 'update'])->name("Keahlian.update");
Route::delete("/hapuskeahlian/{id}", [keahlianController::class, 'delete'])->name("Keahlian.delete");

Route::get("/datauser", [UserController::class, 'index'])->name("User.index");
Route::post("/tambahuser", [UserController::class, 'tambah'])->name("User.tambah");
Route::get("/edituser/{id}", [UserController::class, 'edit'])->name("User.edit");
Route::patch("/updateuser/{id}", [UserController::class, 'update'])->name("User.update");
Route::delete("/hapususer/{id}", [UserController::class, 'delete'])->name("User.delete");

// route regsiter
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// routes/web.php

// Route::delete('/hapuskedudukan/{id_pegawai}', 'PegawaiController@hapuspegawai');

//route dashboard user
Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');


//route profile user
Route::get('/user/profile', [UserProfileController::class, 'show'])->name('user.profile.show')->middleware('auth');
Route::post('/user/profile', [UserProfileController::class, 'update'])->name('user.profile.update')->middleware('auth');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
