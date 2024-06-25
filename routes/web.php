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

Route::get('register-instruktur', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.instruktur');

Route::get('katalog-pelatihan', [App\Http\Controllers\Pelatihan\LandingPageController::class, 'index'])->name('katalog.pelatihan.index');
Route::get('katalog-pelatihan/{kode}', [App\Http\Controllers\Pelatihan\LandingPageController::class, 'show'])->name('katalog.pelatihan.show');

Route::get('katalog-pendampingan', [App\Http\Controllers\Pendampingan\LandingPageController::class, 'index'])->name('katalog.pendampingan.index');
Route::get('katalog-pendampingan/{kode}', [App\Http\Controllers\Pendampingan\LandingPageController::class, 'show'])->name('katalog.pendampingan.show');

Route::get('/mahasiswa-mbkm/register', [MbkmMbkmUserController::class, 'formMbkm'])->name('register.mbkm');
Route::post('/mahasiswa-mbkm/register', [MbkmMbkmUserController::class, 'store'])->name('mbkm.mbkmuser.store');
Route::get('/mahasiswa-mbkm/timeline', [LandingPageController::class, 'mbkmTimeline'])->name('mbkmTimeline.index');

// contact message
Route::post('contact-message', [App\Http\Controllers\Admin\ContactMessageController::class, 'store'])->middleware('hasValidCaptcha')->name('contact-message.store');

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

        // contact message
        Route::get('contact-message', [App\Http\Controllers\Admin\ContactMessageController::class, 'index'])->name('contact-message.index');
        Route::get('contact-message/{message}', [App\Http\Controllers\Admin\ContactMessageController::class, 'show'])->name('contact-message.show');
        Route::delete('contact-message/{message}', [App\Http\Controllers\Admin\ContactMessageController::class, 'destroy'])->name('contact-message.destroy');

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
        Route::post('/portofolio/delete-image', [PortofolioController::class, 'deleteImage'])->name('portofolio.deleteImage');

        Route::resource('transaction', AdminTransactionController::class)->only(['index', 'show', 'update']);

        Route::get('/admin/profile', [DashboardController::class, 'profileAdmin'])->name('dashboard.profileAdmin.index');
        Route::get('/admin/password', [DashboardController::class, 'updatePasswordAdmin'])->name('dashboard.updatePasswordAdmin.index');
    });

    Route::get('/dashboard/pelatihan', [DashboardController::class, 'indexPelatihan'])->name('dashboard.pelatihan.index');
    Route::post('/pelatihan-user', [PelatihanPelatihanUserController::class, 'store'])->name('pelatihan.pelatihanuser.store');
    
    Route::get('/dashboard/pendampingan', [DashboardController::class, 'indexPendampingan'])->name('dashboard.pendampingan.index');
    Route::get('/dashboard/pendampingan/show-form', [PendampinganPendampinganUserController::class, 'showForm'])->name('pendampingan.showForm');
    Route::post('/pendampingan-user', [PendampinganPendampinganUserController::class, 'store'])->name('pendampingan.pendampingan.store');
    Route::put('/pendampingan-user/{id}', [PendampinganPendampinganUserController::class, 'update'])->name('pendampingan.pendampinganuser.update');
    
    Route::get('/transaction-user/bayar/{id}', [TransactionsController::class, 'index'])->name('transaction.bayar.index');
    Route::put('/transaction-user/bayar/{id}', [TransactionsController::class, 'update'])->name('transaction.bayar.update');
    
    Route::get('/dashboard/profile', [DashboardController::class, 'profileGuest'])->name('dashboard.profileGuest.index');
    Route::put('/dashboard/profile', [DashboardController::class, 'profileGuestUpdate'])->name('dashboard.profileGuest.update');
    Route::get('/dashboard/password', [DashboardController::class, 'passwordGuest'])->name('dashboard.passwordGuest.index');
    Route::put('/dashboard/password', [DashboardController::class, 'passwordGuestUpdate'])->name('dashboard.passwordGuest.update');
});
