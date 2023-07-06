<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\EmployerPostController;
use App\Http\Controllers\EpinController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PayslipController;
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
    Route::get('/about-us', 'aboutus')->name('aboutus');
    Route::get('/services', 'services')->name('services');
    Route::get('/workshop-services', 'workshopservices')->name('workshopservices');
    Route::get('/workshop-services/{slug}', 'workshopservice')->name('workshopservice');
    Route::get('/validate-code', 'validate_code')->name('validate_code');
    Route::get('/training', 'training')->name('training');
    Route::get('/job-permit', 'jobpermit')->name('jobpermit');
    Route::post('/job-permit', 'jobpermit_validate');
    Route::get('/jobs', 'jobs')->name('jobs');
    Route::get('/how-it-works', 'howitworks')->name('howitworks');
    Route::get('/agents', 'agents')->name('agents');
    Route::get('/soft-skills', 'softskills')->name('softskills');
    Route::get('/person', 'person')->name('person');
    Route::get('/staff-and-services', 'staffandservices')->name('staffandservices');
    Route::get('/what-we-offer', 'whatweoffer')->name('whatweoffer');
    Route::get('/jobs-for-today', 'jobsfortoday')->name('jobsfortoday');
    Route::get('/jobs-for-today/{slug}', 'jobfortoday')->name('jobfortoday');
    Route::get('/faq', 'faq')->name('faq');
    Route::get('/top-earners', 'topearners')->name('topearners');
    Route::get('/privacy', 'privacy')->name('privacy');
    Route::get('/terms', 'terms')->name('terms');
    Route::get('/disclaimer', 'disclaimer')->name('disclaimer');
    Route::get('/clients-page', 'clientspage')->name('clientspage');
    Route::get('/testimonials', 'testimonials')->name('testimonials');
    Route::get('/contact-us', 'contactus')->name('contactus');
    Route::get('/aggumentation', 'aggumentation')->name('aggumentation');
    Route::get('/we-offer', 'weoffer')->name('weoffer');
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
        Route::get('/employers', 'employer_list')->name('employers.index');
        Route::get('/get-employers', 'get_employer_list')->name('employers.list');
        Route::get('/workflow-income-page', 'workflow_income')->name('workflow_income');
        Route::get('/earn-workflow-income', 'earn_workflow_income')->name('earn_workflow_income');
        Route::get('/workflow-income-to-nhire-wallet/{id}', 'transfer_workflow_income_to_nhire_wallet')->name('transfer_workflow_income_to_nhire_wallet');
        Route::get('/generate-pay-slip', 'generate_pay_slip')->name('generate_pay_slip');
        Route::get('/transfer-referral-payout', 'transfer_referral_payout')->name('transfer_referral_payout');
        Route::get('/payslips', 'payslips')->name('payslips');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
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
    Route::controller(PayslipController::class)->prefix('payslips-requests')->name('payslips_requests.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/pending', 'pending')->name('pending');
        Route::get('/accepted', 'accepted')->name('accepted');
        Route::get('/rejected', 'rejected')->name('rejected');
        Route::post('/accept', 'accept')->name('accept');
        Route::post('/reject', 'reject')->name('reject');
    });
    Route::resource('blogs', BlogController::class)->except('show');
    Route::resource('packages', PackageController::class)->except('show');
    Route::resource('subadmins', SubAdminController::class)->except('show');
    Route::resource('timeslots', TimeslotController::class)->except('show');
    Route::resource('employers', EmployerController::class)->except('show');
    Route::resource('employer-posts', EmployerPostController::class)->except('show');
    Route::resource('epins', EpinController::class)->except('create', 'edit', 'show', 'update');
});

require __DIR__ . '/auth.php';
