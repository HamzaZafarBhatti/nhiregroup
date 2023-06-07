<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\EpinController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalaryprofileRequestController;
use App\Http\Controllers\SalaryWithdrawalController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\TimeslotController;
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
    Route::get('/workshopservices', 'workshopservices')->name('workshopservices');
    Route::get('/training', 'training')->name('training');
    Route::get('/jobpermit', 'jobpermit')->name('jobpermit');
    Route::post('/jobpermit', 'jobpermit_validate');
    Route::get('/jobs', 'jobs')->name('jobs');
    Route::get('/howitworks', 'howitworks')->name('howitworks');
    Route::get('/agents', 'agents')->name('agents');
    Route::get('/softskills', 'softskills')->name('softskills');
    Route::get('/person', 'person')->name('person');
    Route::get('/staffandservices', 'staffandservices')->name('staffandservices');
    Route::get('/whatweoffer', 'whatweoffer')->name('whatweoffer');
    Route::get('/faq', 'faq')->name('faq');
    Route::get('/topearners', 'topearners')->name('topearners');
    Route::get('/privacy', 'privacy')->name('privacy');
    Route::get('/terms', 'terms')->name('terms');
    Route::get('/disclaimer', 'disclaimer')->name('disclaimer');
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
    Route::controller(UserController::class)->group(function () {
        Route::get('/', 'dashboard')->name('dashboard.main');
        Route::get('/dashboard', 'dashboard');
        Route::get('/salary-dashboard', 'salary_dashboard')->name('dashboard.salary');
        Route::get('/update-is-first-login', 'updateIsFirstLogin')->name('updateIsFirstLogin');
        Route::get('/referrals/direct', 'referrals_direct')->name('referrals.direct');
        Route::get('/referrals/indirect', 'referrals_indirect')->name('referrals.indirect');
        Route::post('/validate-salary-profile', 'validate_salary_profile')->name('validate_salary_profile');
        Route::post('/salary-withdraw-request', 'salary_withdraw_request')->name('withdraw.request');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', /* 'verified', */ 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::controller(SettingController::class)->prefix('settings')->name('settings.')->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::post('/', 'update')->name('update');
        Route::post('/update-logos', 'update_logos')->name('update_logos');
        Route::post('/update-epin', 'update_epin')->name('update_epin');
    });
    Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
        Route::get('/', 'admin_edit')->name('edit');
        Route::patch('/', 'admin_update')->name('update');
    });
    Route::controller(SalaryprofileRequestController::class)->prefix('salary-profile-requests')->name('salary_profile_requests.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/pending', 'pending')->name('pending');
        Route::get('/accepted', 'accepted')->name('accepted');
        Route::get('/rejected', 'rejected')->name('rejected');
        Route::post('/accept', 'accept')->name('accept');
        Route::post('/reject', 'reject')->name('reject');
    });
    Route::controller(SalaryWithdrawalController::class)->prefix('salary-withdrawal-requests')->name('salary_withdrawal_requests.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/pending', 'pending')->name('pending');
        Route::get('/accepted', 'accepted')->name('accepted');
        Route::get('/rejected', 'rejected')->name('rejected');
        Route::post('/accept', 'accept')->name('accept');
        Route::post('/reject', 'reject')->name('reject');
    });
    Route::resource('packages', PackageController::class);
    Route::resource('subadmins', SubAdminController::class);
    Route::resource('timeslots', TimeslotController::class);
    Route::resource('epins', EpinController::class)->except('create', 'edit', 'show', 'update');
});

require __DIR__ . '/auth.php';
