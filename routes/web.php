<?php

use App\Http\Livewire\Admin\Ads\Ads;
use App\Http\Livewire\Admin\Analyses\Analyses;
use App\Http\Livewire\Admin\Analyses\AnalysesEdit;
use App\Http\Livewire\Admin\Analyses\AnalysesSinglePrint;
use App\Http\Livewire\Admin\Applicants\Applicants;
use App\Http\Livewire\Admin\Categories\Categories;
use App\Http\Livewire\Admin\Categories\CategoriesShow;
use App\Http\Livewire\Admin\Consultations\Consultations;
use App\Http\Livewire\Admin\Consultations\ConsultationsCreate;
use App\Http\Livewire\Admin\Consultations\ConsultationsShow;
use App\Http\Livewire\Admin\Consultations\ConsultationsSinglePrint;
use App\Http\Livewire\Admin\Contacts;
use App\Http\Livewire\Admin\Employees\Employees;
use App\Http\Livewire\Admin\Employees\EmployeesEdit;
use App\Http\Livewire\Admin\Expenses\Expenses;
use App\Http\Livewire\Admin\Expenses\ExpensesPrint;
use App\Http\Livewire\Admin\Faqs\Faqs;
use App\Http\Livewire\Admin\FrontEnd;
use App\Http\Livewire\Admin\Home;
use App\Http\Livewire\Admin\Insurances\Insurances;
use App\Http\Livewire\Admin\Login;
use App\Http\Livewire\Admin\Menus\Menus;
use App\Http\Livewire\Admin\Notifications;
use App\Http\Livewire\Admin\Pages\Pages;
use App\Http\Livewire\Admin\PatientPrint\AnalysesPrint;
use App\Http\Livewire\Admin\PatientPrint\PatientPrint;
use App\Http\Livewire\Admin\PatientPrint\PrescriptionsPrint;
use App\Http\Livewire\Admin\PatientPrint\UsersPrint;
use App\Http\Livewire\Admin\PatientPrint\VisitsPrint;
use App\Http\Livewire\Admin\Posts\Posts;
use App\Http\Livewire\Admin\Prescriptions\Prescriptions;
use App\Http\Livewire\Admin\Prescriptions\PrescriptionsEdit;
use App\Http\Livewire\Admin\Prescriptions\PrescriptionsSinglePrint;
use App\Http\Livewire\Admin\Reservations\Reservations;
use App\Http\Livewire\Admin\Revenues\Revenues;
use App\Http\Livewire\Admin\Revenues\RevenuesPrint;
use App\Http\Livewire\Admin\Roles\Roles;
use App\Http\Livewire\Admin\Services\Services;
use App\Http\Livewire\Admin\Settings;
use App\Http\Livewire\Admin\Sliders\Sliders;
use App\Http\Livewire\Admin\Statistics\Statistics;
use App\Http\Livewire\Admin\SubscribesNew;
use App\Http\Livewire\Admin\Users\Users;
use App\Http\Livewire\Admin\Users\UsersCreate;
use App\Http\Livewire\Admin\Users\UsersEdit;
use App\Http\Livewire\Admin\Visits\Visits;
use App\Http\Livewire\Admin\Visits\VisitsEdit;
use App\Http\Livewire\Admin\Visits\VisitsSinglePrint;
use App\Http\Livewire\Site\Auth\Register;
use App\Http\Livewire\Site\News\NewsArchive;
use App\Http\Livewire\Site\News\NewsSingle;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', \App\Http\Livewire\Site\Home::class)->name('home');
Route::get('/news', NewsArchive::class)->name('news');
Route::get('/news/{id}', NewsSingle::class)->name('news-single');
// Route::get('/category/{id}', \App\Http\Livewire\Site\Categories\CategoriesSingle::class)->name('categories-single');

Route::get('/applicants-create', \App\Http\Livewire\Site\ApplicantsCreate::class)->name('applicants-create');
Route::get('/consultation-create', \App\Http\Livewire\Site\AdsCreate::class)->name('consultation-create');
Route::get('/thanks', \App\Http\Livewire\Site\SuccessPage::class)->name('success-page');
Route::get('/whatsapp', \App\Http\Livewire\Site\WhatsAppLink::class)->name('whatsapp-link');

Route::middleware('guest')->group(function () {

    Route::get('/login', \App\Http\Livewire\Site\Auth\Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
//    Route::get('/reset-password', \App\Http\Livewire\Site\Auth\ResetPassword::class)->name('reset-password');
//    Route::get('/auth-password', \App\Http\Livewire\Site\Auth\ResetPassword::class)->name('auth.password');
//    Route::get('/update-password', \App\Http\Livewire\Site\Auth\UpdatePassword::class)->name('password.reset');
});

Route::middleware('auth')->group(function () {
//    Route::get('/profile', \App\Http\Livewire\Site\Profile::class)->name('site.profile');
    Route::any('/logout', \App\Http\Livewire\Site\Auth\Login::class)->name('logout');
});

Route::prefix('admin')->group(function () {

    Route::get('/login', Login::class)->name('admin.login');
    Route::any('/logout', Login::class)->name('admin.logout');

    Route::middleware(['auth'])->group(function () {

        Route::get('/', Home::class)->name('admin.home');
        Route::get('/settings', Settings::class)->middleware('permission:settings show')->name('admin.settings');

        Route::prefix('users')->group(function () {
            Route::get('/', Users::class)->middleware('permission:users show')->name('admin.users');
            Route::get('/create', UsersCreate::class)->middleware('permission:users create')->name('admin.users.create');
            Route::get('/edit/{id}', UsersEdit::class)->middleware('permission:users edit')->name('admin.users.edit');
//            Route::get('/{id}', \App\Http\Livewire\Admin\Users\UsersShow::class)->middleware(['permission:users show'])->name('admin.users.show');
        });

        Route::prefix('print')->group(function () {
            Route::get('/patient', PatientPrint::class)->middleware(['permission:users print'])->name('admin.patient.print');
            Route::get('/visits', VisitsPrint::class)->middleware(['permission:users print'])->name('admin.visits.print');
            Route::get('/analyses', AnalysesPrint::class)->middleware(['permission:users print'])->name('admin.analyses.print');
            Route::get('/prescriptions', PrescriptionsPrint::class)->middleware(['permission:users print'])->name('admin.prescriptions.print');
            Route::get('/users', UsersPrint::class)->middleware(['permission:users print'])->name('admin.user.print');

            Route::get('/generate-pdf', UsersPrint::class)
    ->name('admin.user.generatepdf');
        });

        Route::prefix('employees')->group(function () {
            Route::get('/', Employees::class)->middleware('permission:employees show')->name('admin.employees');
            Route::get('/edit/{id}', EmployeesEdit::class)->middleware('permission:users edit')->name('admin.employees.edit');
//            Route::get('/{id}', \App\Http\Livewire\Admin\Employees\EmployeesShow::class)->middleware(['permission:users show'])->name('admin.users.show');
        });

        Route::prefix('roles')->group(function () {
            Route::get('/', Roles::class)->middleware('permission:roles show')->name('admin.roles');
        });

        Route::prefix('visits')->group(function () {
            Route::get('/', Visits::class)->middleware('permission:visits show')->name('admin.visits');
            Route::get('/print/{id}', VisitsSinglePrint::class)->middleware(['permission:users print'])->name('admin.visits.single.print');
            Route::get('/edit/{id}', VisitsEdit::class)->middleware('permission:visits edit')->name('admin.visits.edit');
        });

        Route::prefix('prescriptions')->group(function () {
            Route::get('/', Prescriptions::class)->middleware('permission:prescriptions show')->name('admin.prescriptions');
            Route::get('/print/{id}', PrescriptionsSinglePrint::class)->middleware(['permission:users print'])->name('admin.prescriptions.single.print');
            Route::get('/edit/{id}', PrescriptionsEdit::class)->middleware('permission:prescriptions edit')->name('admin.prescriptions.edit');
        });

        Route::prefix('analyses')->group(function () {
            Route::get('/', Analyses::class)->middleware('permission:analyses show')->name('admin.analyses');
            Route::get('/print/{id}', AnalysesSinglePrint::class)->middleware(['permission:users print'])->name('admin.analyses.single.print');
            Route::get('/edit/{id}', AnalysesEdit::class)->middleware('permission:analyses edit')->name('admin.analyses.edit');
        });

        Route::prefix('categories')->group(function () {
            Route::get('/', Categories::class)->middleware('permission:categories show')->name('admin.categories');
            Route::get('/{id}', CategoriesShow::class)->middleware(['permission:categories show'])->name('admin.categories.show');
        });

        Route::prefix('services')->group(function () {
            Route::get('/', Services::class)->middleware('permission:services show')->name('admin.services');
        });

            Route::prefix('consultations')->group(function () {
            Route::get('/', Consultations::class)->middleware('permission:consultations show')->name('admin.consultations');
            Route::get('/print/{id}', ConsultationsSinglePrint::class)->middleware(['permission:users print'])->name('admin.consultations.single.print');
            Route::get('/create', ConsultationsCreate::class)->middleware('permission:consultations create')->name('admin.consultations.create');
            Route::get('/show-edit/{id}', ConsultationsShow::class)->name('admin.consultations.show-edit');
        });

        Route::prefix('reservations')->group(function () {
            Route::get('/', Reservations::class)->middleware('permission:reservations show')->name('admin.reservations');
        });

        Route::prefix('revenues')->group(function () {
            Route::get('/', Revenues::class)->middleware('permission:revenues show')->name('admin.revenues');
            Route::get('/print', RevenuesPrint::class)->middleware('permission:revenues show')->name('admin.revenues.print');
        });

        Route::prefix('expenses')->group(function () {
            Route::get('/', Expenses::class)->middleware('permission:expenses show')->name('admin.expenses');
            Route::get('/print', ExpensesPrint::class)->middleware('permission:expenses show')->name('admin.expenses.print');
        });

        Route::prefix('insurances')->group(function () {
            Route::get('/', Insurances::class)->middleware('permission:insurances show')->name('admin.insurances');
        });

        Route::prefix('pages')->group(function () {
            Route::get('/', Pages::class)->middleware('permission:pages show')->name('admin.pages');
        });

        Route::prefix('faqs')->group(function () {
            Route::get('/', Faqs::class)->middleware('permission:faqs show')->name('admin.faqs');
        });

        Route::prefix('posts')->group(function () {
            Route::get('/', Posts::class)->middleware('permission:posts show')->name('admin.posts');
        });

        Route::prefix('sliders')->group(function () {
            Route::get('/', Sliders::class)->middleware('permission:sliders show')->name('admin.sliders');
        });

        Route::prefix('ads')->group(function () {
            Route::get('/', Ads::class)->middleware('permission:ads show')->name('admin.ads');
        });

        Route::prefix('contacts')->group(function () {
            Route::get('/', Contacts::class)->middleware('permission:contacts show')->name('admin.contacts');
        });

        Route::prefix('subscribes')->group(function () {
            Route::get('/', SubscribesNew::class)->middleware('permission:subscribes show')->name('admin.subscribes');
        });

        Route::prefix('notifications')->group(function () {
            Route::get('/', Notifications::class)->middleware('permission:notifications show')->name('admin.notifications');
        });

        Route::prefix('menus')->group(function () {
            Route::get('/', Menus::class)->middleware('permission:menus show')->name('admin.menus');
        });

        Route::prefix('frontend')->group(function () {
            Route::get('/', FrontEnd::class)->middleware('permission:menus show')->name('admin.frontend');
        });

        Route::prefix('applicants')->group(function () {
            Route::get('/', Applicants::class)->middleware('permission:applicants show')->name('admin.applicants');
//            Route::get('/{id}', \App\Http\Livewire\Admin\Applicants\ApplicantsShow::class)->middleware(['permission:applicants show'])->name('admin.applicants.show');
        });

        Route::prefix('statistics')->group(function () {
            Route::get('/', Statistics::class)->middleware('permission:statistics show')->name('admin.statistics');
        });
    });
});


