<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\Admin\TourPackageController;
use App\Http\Controllers\Admin\AttractionController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/berita/{slug}', [HomeController::class, 'showNews'])->name('news.show');

Route::get('/umkm', [PageController::class, 'umkm'])->name('pages.umkm');
Route::get('/umkm/{id}', [PageController::class, 'umkmDetail'])->name('pages.umkm-detail');

Route::get('/atraksi', [PageController::class, 'atraksi'])->name('pages.atraksi');
Route::get('/atraksi/dummy-detail', [PageController::class, 'atraksiDetail'])->name('pages.atraksi-detail');

Route::get('/berita-acara', [PageController::class, 'berita'])->name('pages.berita');
Route::get('/berita-acara/{slug}', [PageController::class, 'beritaDetail'])->name('pages.berita-detail');

Route::get('/paket-wisata', [PageController::class, 'paketWisata'])->name('pages.paket-wisata');
Route::get('/paket-wisata/dummy-detail', [PageController::class, 'paketWisataDetail'])->name('pages.paket-wisata-detail');

Route::get('/profil', [PageController::class, 'profil'])->name('pages.profil');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

// Route::group(['middleware' => ['auth', 'role:Admin']], function(){
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('news', NewsController::class);
        Route::resource('umkm', UmkmController::class);
        Route::resource('packages', TourPackageController::class);
        Route::resource('attractions', AttractionController::class);
        Route::resource('organizations', OrganizationController::class);

        Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
        Route::get('/bookings/{id}', [AdminBookingController::class, 'show'])->name('bookings.show');
        Route::post('/bookings/update-status', [AdminBookingController::class, 'updateStatus'])
            ->name('bookings.updateStatus');
        Route::delete('/bookings/{id}', [AdminBookingController::class, 'destroy'])
            ->name('bookings.destroy');

        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::get('/profile', function () {
            return view('admin.profile.edit');
        })->name('profile.edit');
    });
// });


