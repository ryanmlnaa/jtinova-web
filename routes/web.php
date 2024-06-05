<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Instruktur\InstrukturUserController as InstrukturInstrukturUserController;
use App\Http\Controllers\Admin\InstrukturUserController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\KeahlianController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Admin\PelatihanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\MbkmUserController;
use App\Http\Controllers\Admin\PelatihanTeamController;
use App\Http\Controllers\Mbkm\MbkmUserController as MbkmMbkmUserController;
use App\Http\Controllers\Admin\PelatihanUserController;
use App\Http\Controllers\Pelatihan\PelatihanUserController as PelatihanPelatihanUserController;
use App\Http\Controllers\Pendampingan\PendampinganUserController as PendampinganPendampinganUserController;
use App\Http\Controllers\Admin\PendampinganUserController;
use App\Http\Controllers\Admin\SkemaPendampinganController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebConfigController;
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
        Route::resource('keahlian', KeahlianController::class)->except(['show', 'edit']);

        // prodi
        Route::resource('prodi', ProdiController::class)->except(['show', 'edit']);

        // Category
        Route::resource('category', CategoryController::class);

        // skemaPendampingan
        Route::resource('skemaPendampingan', SkemaPendampinganController::class)->except(['show']);

        // pelatihan
        Route::resource("pelatihan", PelatihanController::class)->except(['show']);

        // user
        Route::resource('user', UserController::class)->except(['show', 'edit']);

        // pegawai
        
        Route::resource('pegawai', PegawaiController::class);
        
        // mbkm
        Route::resource('mbkmuser', MbkmUserController::class)->except(['create', 'show', 'edit']);

        // instruktur
        Route::resource("instruktur", InstrukturUserController::class)->except(['create', 'show', 'edit']);

        // peserta pendampingan
        Route::resource("/pendampinganuser", PendampinganUserController::class)->except(['create', 'show', 'edit']);

        // peserta pelatihan
        Route::resource("/pelatihanuser", PelatihanUserController::class)->except(['create', 'show', 'edit']);

        // peserta pelatihan team
        Route::resource("/pelatihanteam", PelatihanTeamController::class)->except(['create', 'edit']);

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
