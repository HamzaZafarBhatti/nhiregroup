<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\EpinController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
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

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::name('front.')->controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/aboutus', 'aboutus')->name('aboutus');
    Route::get('/services', 'services')->name('services');
    Route::get('/tdservices', 'tdservices')->name('tdservices');
    Route::get('/training', 'training')->name('training');
    Route::get('/ojt', 'ojt')->name('ojt');
    Route::get('/softskills', 'softskills')->name('softskills');
    Route::get('/person', 'person')->name('person');
    Route::get('/staffing_services', 'staffing_services')->name('staffing_services');
    Route::get('/rpo_services', 'rpo_services')->name('rpo_services');
    Route::get('/microsoftmsb', 'microsoftmsb')->name('microsoftmsb');
    Route::get('/sapsoft', 'sapsoft')->name('sapsoft');
    Route::get('/technologies', 'technologies')->name('technologies');
    Route::get('/clientspage', 'clientspage')->name('clientspage');
    Route::get('/testimonials', 'testimonials')->name('testimonials');
    Route::get('/contactus', 'contactus')->name('contactus');
    Route::get('/aggumentation', 'aggumentation')->name('aggumentation');
    Route::get('/weoffer', 'weoffer')->name('weoffer');
});

Route::controller(SettingController::class)->prefix('settings')->name('settings.')->group(function () {
    Route::post('/set-theme', 'set_theme')->name('set_theme');
});

Route::middleware(['auth', /* 'verified', */ 'user'])->name('user.')->prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/update-is-first-login', [UserController::class, 'updateIsFirstLogin'])->name('updateIsFirstLogin');
    Route::get('/dashboard', [UserController::class, 'dashboard']);
    Route::get('/referrals/direct', [UserController::class, 'referrals_direct'])->name('referrals.direct');
    Route::get('/referrals/indirect', [UserController::class, 'referrals_indirect'])->name('referrals.indirect');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::controller(SettingController::class)->prefix('settings')->name('settings.')->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::post('/', 'update')->name('update');
        Route::post('/update_logos', 'update_logos')->name('update_logos');
        Route::post('/update_epin', 'update_epin')->name('update_epin');
    });
    Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
        Route::get('/', 'admin_edit')->name('edit');
        Route::patch('/', 'admin_update')->name('update');
    });
    Route::resource('packages', PackageController::class);
    Route::resource('employers', EmployerController::class);
    // Route::resource('vendors', VendorController::class);
    Route::resource('epins', EpinController::class)->except('create', 'edit', 'show', 'update');
});

require __DIR__ . '/auth.php';
