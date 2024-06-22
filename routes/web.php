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
use App\Http\Controllers\Admin\PortofolioController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\MbkmUserController;
use App\Http\Controllers\Admin\PelatihanTeamController;
use App\Http\Controllers\Mbkm\MbkmUserController as MbkmMbkmUserController;
use App\Http\Controllers\Admin\PelatihanUserController;
use App\Http\Controllers\Pelatihan\PelatihanUserController as PelatihanPelatihanUserController;
use App\Http\Controllers\Pendampingan\PendampinganUserController as PendampinganPendampinganUserController;
use App\Http\Controllers\Admin\PendampinganUserController;
use App\Http\Controllers\Admin\SkemaPendampinganController;
use App\Http\Controllers\Admin\TimelineController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebConfigController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [LandingPageController::class, 'index'])->name('landing.page');

Route::get('/portfolio/{id}', [LandingPageController::class, 'show'])->name('portfolio.show');

Auth::routes(['verify' => true]);

Route::get('register-mbkm', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.mbkm');
Route::get('register-pendampingan', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.pendampingan');
Route::get('register-pelatihan', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.pelatihan');
Route::get('register-instruktur', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.instruktur');

Route::get('katalog-pelatihan', [App\Http\Controllers\Pelatihan\LandingPageController::class, 'index'])->name('katalog.pelatihan.index');
Route::get('katalog-pelatihan/{kode}', [App\Http\Controllers\Pelatihan\LandingPageController::class, 'show'])->name('katalog.pelatihan.show');

Route::get('katalog-pendampingan', [App\Http\Controllers\Pendampingan\LandingPageController::class, 'index'])->name('katalog.pendampingan.index');
Route::get('katalog-pendampingan/{kode}', [App\Http\Controllers\Pendampingan\LandingPageController::class, 'show'])->name('katalog.pendampingan.show');

// 
Route::get('timeline-pendaftaran-mbkm', [LandingPageController::class, 'mbkmTimeline'])->name('mbkmTimeline.index');

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

        // timeline
        Route::resource('timeline', TimelineController::class)->except(['show']);
        
        // mbkm
        Route::resource('mbkmuser', MbkmUserController::class)->except(['create', 'show', 'edit']);
        Route::get('mbkmuser/{timeline}/show-users', [MbkmUserController::class, 'showUsers'])->name('mbkmuser.showUsers');
        Route::post('mbkmuser/notify-pendaftaran/{mbkmUser}', [MbkmUserController::class, 'notifyPendaftaran'])->name('mbkmuser.notifyPendaftaran');

        // instruktur
        Route::resource("instruktur", InstrukturUserController::class)->except(['create', 'show', 'edit']);

        // peserta pendampingan
        Route::resource("/pendampinganuser", PendampinganUserController::class)->except(['create', 'show', 'edit']);

        // peserta pelatihan
        Route::resource("/pelatihanuser", PelatihanUserController::class)->except(['create', 'show', 'edit']);

        // peserta pelatihan team
        Route::resource("/pelatihanteam", PelatihanTeamController::class)->except(['create', 'edit']);

        // portofolio
        Route::resource('/portofolio', PortofolioController::class)->except('show');

        Route::resource('transaction', AdminTransactionController::class)->only(['index', 'show', 'update']);
    });

    // route with middleware mahasiswa-mbkm
    Route::group(['middleware' => ['can:fill-profile']], function(){
        // fill form
        Route::put('/mahasiswa-mbkm/{mbkmUser}', [MbkmMbkmUserController::class, 'update'])->name('mbkm.mbkmuser.update');
        Route::put('/pendampingan-user/{pendampinganUser}', [PendampinganPendampinganUserController::class, 'update'])->name('pendampingan.pendampinganuser.update');
        Route::put('/pelatihan-user/{pelatihanUser}', [PelatihanPelatihanUserController::class, 'update'])->name('pelatihan.pelatihanuser.update');
        Route::put('/instruktur-user/{instrukturUser}', [InstrukturInstrukturUserController::class, 'update'])->name('instruktur.instrukturuser.update');
    });

    Route::get('/dashboard/pelatihan', [DashboardController::class, 'indexPelatihan'])->name('dashboard.pelatihan.index');
    Route::post('/pelatihan-user', [PelatihanPelatihanUserController::class, 'store'])->name('pelatihan.pelatihanuser.store');
    Route::get('/transaction-user/bayar/{id}', [TransactionsController::class, 'index'])->name('transaction.bayar.index');
    Route::put('/transaction-user/bayar/{id}', [TransactionsController::class, 'update'])->name('transaction.bayar.update');
});
