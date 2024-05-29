<?php

use App\Http\Controllers\BenefitController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KeahlianController;
use App\Http\Controllers\KedudukanController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MbkmUser;
use App\Http\Controllers\MbkmUserController;
use App\Http\Controllers\Mbkm\MbkmUserController as MbkmMbkmUserController;
use App\Http\Controllers\Pendampingan\PendampinganUserController as PendampinganPendampinganUserController;
use App\Http\Controllers\PendampinganUserController;
use App\Http\Controllers\SkemaPendampinganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
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

Route::get('/', [LandingPageController::class, 'index'])->name('lading.page');

Auth::routes(['verify' => true]);

Route::get('register-mbkm', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.mbkm');
Route::get('register-pendampingan', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.pendampingan');

Route::group(['middleware' => ['auth']], function(){
    // home or dashboard
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('verified')->name('dashboard');

    // middleware role admin and pegawai
    Route::group(['middleware' => ['role:admin|pegawai']], function(){
        // web config
        Route::get('/webconfig', [App\Http\Controllers\WebConfigController::class, 'index'])->name('webconfig');
        Route::post('/simpanwebconfig', [App\Http\Controllers\WebConfigController::class, 'simpanwebconfig'])->name('simpanwebconfig');

        // produk
        Route::get('/dataproduk', [App\Http\Controllers\ProdukController::class, 'index'])->name('dataproduk');

        // pegawai
        Route::get('/datapegawai', [App\Http\Controllers\PegawaiController::class, 'index'])->name('datapegawai');
        Route::post('/tambahdatapegawai', [App\Http\Controllers\PegawaiController::class, 'tambahdata_pegawai'])->name('tambahdatapegawai');
        Route::delete('/hapuspegawai/{id_pegawai}', [App\Http\Controllers\PegawaiController::class, 'hapuspegawai'])->name('hapuspegawai.destroy');
        Route::get('/edit_pegawai/{id}', [App\Http\Controllers\PegawaiController::class, 'edit'])->name('Pegawai.edit');
        Route::patch('/update_pegawai/{id}', [PegawaiController::class, "update"])->name("Pegawai.update");

        // jabatan
        Route::resource('Jabatan', JabatanController::class);

        // mbkm
        Route::get("/mbkmuser", [MbkmUserController::class, 'index'])->name("mbkmuser.index");
        Route::post("/mbkmuser", [MbkmUserController::class, 'store'])->name("mbkmuser.store");
        Route::get("/mbkmuser/{mbkmUser}", [MbkmUserController::class, 'edit'])->name("mbkmuser.edit");
        Route::patch("/mbkmuser/{mbkmUser}", [MbkmUserController::class, 'update'])->name("mbkmuser.update");
        Route::delete("/mbkmuser/{mbkmUser}", [MbkmUserController::class, 'destroy'])->name("mbkmuser.destroy");


        // portofolio
        Route::get("/dataportofolio", [PortofolioController::class, 'index'])->name("Portofolio.index");
        Route::post("/tambahportofolio", [PortofolioController::class, 'tambah'])->name("Portofolio.tambah");
        Route::get("/editportofolio/{id}", [PortofolioController::class, 'edit'])->name("Portofolio.edit");
        Route::patch("/updateportofolio/{id}", [PortofolioController::class, 'update'])->name("Portofolio.update");
        Route::delete("/hapusportofolio/{id}", [PortofolioController::class, 'delete'])->name("Portofolio.delete");

        // pelatihan
        Route::get("/datapelatihan", [PelatihanController::class, 'index'])->name("pelatihan.index");
        Route::post("/tambahpelatihan", [PelatihanController::class, 'tambah'])->name("Pelatihan.tambah");
        Route::get("/editpelatihan/{id}", [PelatihanController::class, 'edit'])->name("Pelatihan.edit");
        Route::patch("/updatepelatihan/{id}", [PelatihanController::class, 'update'])->name("Pelatihan.update");
        Route::delete("/hapuspelatihan/{id}", [PelatihanController::class, 'delete'])->name("Pelatihan.delete");

        // benefit
        Route::get("/databenefit", [BenefitController::class, 'index'])->name("Benefit.index");
        Route::post("/tambahbenefit", [BenefitController::class, 'tambah'])->name("Benefit.tambah");
        Route::get("/editbenefit/{id}", [BenefitController::class, 'edit'])->name("Benefit.edit");
        Route::patch("/updatebenefit/{id}", [BenefitController::class, 'update'])->name("Benefit.update");
        Route::delete("/hapusbenefit/{id}", [BenefitController::class, 'delete'])->name("Benefit.delete");

        // keahlian
        Route::get("/datakeahlian", [KeahlianController::class, 'index'])->name("keahlian.index");
        Route::post("/keahlian", [keahlianController::class, 'store'])->name("keahlian.store");
        Route::patch("/keahlian/{id}", [keahlianController::class, 'update'])->name("keahlian.update");
        Route::delete("/keahlian/{id}", [keahlianController::class, 'destroy'])->name("keahlian.destroy");

        // prodi
        Route::get("/prodi", [ProdiController::class, 'index'])->name("prodi.index");
        Route::post("/prodi", [ProdiController::class, 'store'])->name("prodi.store");
        Route::put("/prodi/{prodi}", [ProdiController::class, 'update'])->name("prodi.update");
        Route::delete("/prodi/{prodi}", [ProdiController::class, 'destroy'])->name("prodi.destroy");

        // skemaPendampingan
        Route::get("/skemaPendampingan", [SkemaPendampinganController::class, 'index'])->name("skemaPendampingan.index");
        Route::get("/skemaPendampingan/create", [SkemaPendampinganController::class, 'create'])->name("skemaPendampingan.create");
        Route::post("/skemaPendampingan", [SkemaPendampinganController::class, 'store'])->name("skemaPendampingan.store");
        Route::get("/skemaPendampingan/{skemaPendampingan}/edit", [SkemaPendampinganController::class, 'edit'])->name("skemaPendampingan.edit");
        Route::put("/skemaPendampingan/{skemaPendampingan}", [SkemaPendampinganController::class, 'update'])->name("skemaPendampingan.update");
        Route::delete("/skemaPendampingan/{skemaPendampingan}", [SkemaPendampinganController::class, 'destroy'])->name("skemaPendampingan.destroy");

        // user
        Route::get("/datauser", [UserController::class, 'index'])->name("User.index");
        Route::post("/tambahuser", [UserController::class, 'tambah'])->name("User.tambah");
        Route::get("/edituser/{id}", [UserController::class, 'edit'])->name("User.edit");
        Route::patch("/updateuser/{id}", [UserController::class, 'update'])->name("User.update");
        Route::delete("/hapususer/{id}", [UserController::class, 'delete'])->name("User.delete");

        // peserta
        Route::get("/pendampingan-user", [PendampinganUserController::class, 'index'])->name("pendampinganUser.index");
        Route::delete("/pendampingan-user/{pendampinganUser}", [PendampinganUserController::class, 'destroy'])->name("pendampinganUser.destroy");

        // instruktur
        Route::get("/datainstruktur", [InstrukturController::class, 'index'])->name("Instruktur.index");
        Route::post("/tambahinstruktur", [InstrukturController::class, 'tambah'])->name("Instruktur.tambah");
        Route::get("/editinstruktur/{id}", [InstrukturController::class, 'edit'])->name("Instruktur.edit");
        Route::patch("/updateinstruktur/{id}", [InstrukturController::class, 'update'])->name("Instruktur.update");
        Route::delete("/hapusinstruktur/{id}", [InstrukturController::class, 'delete'])->name("Instruktur.delete");

        // pembayaran
        Route::get("/datapembayaran", [PembayaranController::class, 'index'])->name("Pembayaran.index");
        Route::post("/tambahpembayaran", [PembayaranController::class, 'tambah'])->name("Pembayaran.tambah");
        Route::get("/editpembayaran/{id}", [PembayaranController::class, 'edit'])->name("Pembayaran.edit");
        Route::patch("/updatepembayaran/{id}", [PembayaranController::class, 'update'])->name("Pembayaran.update");
        Route::delete("/hapuspembayaran/{id}", [PembayaranController::class, 'delete'])->name("Pembayaran.delete");
    });

    // route with middleware mahasiswa-mbkm
    Route::group(['middleware' => ['can:fill-profile']], function(){
        // route mbkm
        Route::put('/mahasiswa-mbkm/{mbkmUser}', [MbkmMbkmUserController::class, 'update'])->name('mbkm.mbkmuser.update');
        Route::put('/pendampingan-user/{pendampinganUser}', [PendampinganPendampinganUserController::class, 'update'])->name('pendampingan.pendampinganuser.update');
    });
});

//route dashboard user
Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

//route profile user
Route::get('/user/profile', [UserProfileController::class, 'show'])->name('user.profile.show')->middleware('auth');
Route::post('/user/profile', [UserProfileController::class, 'update'])->name('user.profile.update')->middleware('auth');

Route::get('/pendaftaran', function () {
    return view('pendaftaran_ta.index');
})->name('pendaftaran');

Route::get('/bukti_bayar', function () {
    return view('bukti_bayar.index');
})->name('bukti_bayar');
