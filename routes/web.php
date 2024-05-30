<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Instruktur\InstrukturUserController as InstrukturInstrukturUserController;
use App\Http\Controllers\InstrukturUserController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KeahlianController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MbkmUserController;
use App\Http\Controllers\Mbkm\MbkmUserController as MbkmMbkmUserController;
use App\Http\Controllers\PelatihanUserController;
use App\Http\Controllers\Pelatihan\PelatihanUserController as PelatihanPelatihanUserController;
use App\Http\Controllers\Pendampingan\PendampinganUserController as PendampinganPendampinganUserController;
use App\Http\Controllers\PendampinganUserController;
use App\Http\Controllers\SkemaPendampinganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebConfigController;
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
Route::get('register-pelatihan', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.pelatihan');
Route::get('register-instruktur', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.instruktur');

Route::group(['middleware' => ['auth']], function(){
    // home or dashboard
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('verified')->name('dashboard');

    // middleware role admin and pegawai
    Route::group(['middleware' => ['role:admin|pegawai']], function(){
        // web config
        Route::get('/web-config', [WebConfigController::class, 'index'])->name('webconfig.index');
        Route::put('/web-config', [WebConfigController::class, 'update'])->name('webconfig.update');

        // jabatan
        Route::resource('jabatan', JabatanController::class)->except(['show', 'edit']);

        // keahlian
        Route::get("/keahlian", [KeahlianController::class, 'index'])->name("keahlian.index");
        Route::post("/keahlian", [keahlianController::class, 'store'])->name("keahlian.store");
        Route::patch("/keahlian/{id}", [keahlianController::class, 'update'])->name("keahlian.update");
        Route::delete("/keahlian/{id}", [keahlianController::class, 'destroy'])->name("keahlian.destroy");

        // prodi
        Route::get("/prodi", [ProdiController::class, 'index'])->name("prodi.index");
        Route::post("/prodi", [ProdiController::class, 'store'])->name("prodi.store");
        Route::put("/prodi/{prodi}", [ProdiController::class, 'update'])->name("prodi.update");
        Route::delete("/prodi/{prodi}", [ProdiController::class, 'destroy'])->name("prodi.destroy");

        // Category
        Route::resource('category', CategoryController::class);

        // skemaPendampingan
        Route::resource('skemaPendampingan', SkemaPendampinganController::class)->except(['show']);

        // pelatihan
        Route::resource("pelatihan", PelatihanController::class)->except(['show']);

        // user
        Route::get("/datauser", [UserController::class, 'index'])->name("User.index");
        Route::post("/tambahuser", [UserController::class, 'tambah'])->name("User.tambah");
        Route::get("/edituser/{id}", [UserController::class, 'edit'])->name("User.edit");
        Route::patch("/updateuser/{id}", [UserController::class, 'update'])->name("User.update");
        Route::delete("/hapususer/{id}", [UserController::class, 'delete'])->name("User.delete");

        // pegawai
        Route::get('/datapegawai', [App\Http\Controllers\PegawaiController::class, 'index'])->name('datapegawai');
        Route::post('/tambahdatapegawai', [App\Http\Controllers\PegawaiController::class, 'tambahdata_pegawai'])->name('tambahdatapegawai');
        Route::delete('/hapuspegawai/{id_pegawai}', [App\Http\Controllers\PegawaiController::class, 'hapuspegawai'])->name('hapuspegawai.destroy');
        Route::get('/edit_pegawai/{id}', [App\Http\Controllers\PegawaiController::class, 'edit'])->name('Pegawai.edit');
        Route::patch('/update_pegawai/{id}', [PegawaiController::class, "update"])->name("Pegawai.update");
        
        // mbkm
        Route::get("/mbkmuser", [MbkmUserController::class, 'index'])->name("mbkmuser.index");
        Route::post("/mbkmuser", [MbkmUserController::class, 'store'])->name("mbkmuser.store");
        Route::get("/mbkmuser/{mbkmUser}", [MbkmUserController::class, 'edit'])->name("mbkmuser.edit");
        Route::patch("/mbkmuser/{mbkmUser}", [MbkmUserController::class, 'update'])->name("mbkmuser.update");
        Route::delete("/mbkmuser/{mbkmUser}", [MbkmUserController::class, 'destroy'])->name("mbkmuser.destroy");

        // instruktur
        Route::get("/instruktur", [InstrukturUserController::class, 'index'])->name("instruktur.index");
        Route::delete("/instruktur/{instrukturUser}", [InstrukturUserController::class, 'destroy'])->name("instruktur.destroy");

        // peserta pendampingan
        Route::get("/pendampingan-user", [PendampinganUserController::class, 'index'])->name("pendampinganUser.index");
        Route::delete("/pendampingan-user/{pendampinganUser}", [PendampinganUserController::class, 'destroy'])->name("pendampinganUser.destroy");

        // peserta pelatihan
        Route::get("/pelatihan-user", [PelatihanUserController::class, 'index'])->name("pelatihanUser.index");
        Route::delete("/pelatihan-user/{pelatihanUser}", [PelatihanUserController::class, 'destroy'])->name("pelatihanUser.destroy");

        // produk
        Route::get('/dataproduk', [App\Http\Controllers\ProdukController::class, 'index'])->name('dataproduk');

        // portofolio
        Route::get("/dataportofolio", [PortofolioController::class, 'index'])->name("Portofolio.index");
        Route::post("/tambahportofolio", [PortofolioController::class, 'tambah'])->name("Portofolio.tambah");
        Route::get("/editportofolio/{id}", [PortofolioController::class, 'edit'])->name("Portofolio.edit");
        Route::patch("/updateportofolio/{id}", [PortofolioController::class, 'update'])->name("Portofolio.update");
        Route::delete("/hapusportofolio/{id}", [PortofolioController::class, 'delete'])->name("Portofolio.delete");

        // pembayaran
        Route::get("/datapembayaran", [PembayaranController::class, 'index'])->name("Pembayaran.index");
        Route::post("/tambahpembayaran", [PembayaranController::class, 'tambah'])->name("Pembayaran.tambah");
        Route::get("/editpembayaran/{id}", [PembayaranController::class, 'edit'])->name("Pembayaran.edit");
        Route::patch("/updatepembayaran/{id}", [PembayaranController::class, 'update'])->name("Pembayaran.update");
        Route::delete("/hapuspembayaran/{id}", [PembayaranController::class, 'delete'])->name("Pembayaran.delete");
    });

    // route with middleware mahasiswa-mbkm
    Route::group(['middleware' => ['can:fill-profile']], function(){
        // fill form
        Route::put('/mahasiswa-mbkm/{mbkmUser}', [MbkmMbkmUserController::class, 'update'])->name('mbkm.mbkmuser.update');
        Route::put('/pendampingan-user/{pendampinganUser}', [PendampinganPendampinganUserController::class, 'update'])->name('pendampingan.pendampinganuser.update');
        Route::put('/pelatihan-user/{pelatihanUser}', [PelatihanPelatihanUserController::class, 'update'])->name('pelatihan.pelatihanuser.update');
        Route::put('/instruktur-user/{instrukturUser}', [InstrukturInstrukturUserController::class, 'update'])->name('instruktur.instrukturuser.update');
    });
});
