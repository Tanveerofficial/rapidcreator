<?php

use App\Http\Controllers\{AuthenticationController, CronJobController, CsvFileController, FontController, ImageProcessing, PagesController, TemplateController};
use Illuminate\Support\Facades\{Artisan, Route};
// =======================Clear Cache===============
Route::get('/clear', function () {
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    Artisan::call('event:clear');
    echo 'Cache Cleared';
});
// =======================Clear Cache===============
// =======================Pages Routes===============
Route::get('/');
Route::get('/dashboard');
Route::get('index', [\App\Http\Controllers\InstallationController::class, 'index'])->name('index');
Route::post('install', [\App\Http\Controllers\InstallationController::class, 'install'])->name('install');
Route::get('success', [\App\Http\Controllers\PagesController::class, 'success'])->name('success');
Route::controller(PagesController::class)->group(function () {
    Route::get('/', function () {
        if (file_exists(public_path('installed'))) {
            return view('Authentication.signin');
        } else {
            return view('Installation.install');
        }
    })->name('authentication.signin');
    Route::get('/forget', 'forget')->name('authenticaion.forget');
});
// =======================Pages Routes===============
// ================Authentication Routes======================
Route::controller(AuthenticationController::class)->group(function () {
    Route::post('/signin', 'signin')->name('authentication.login');
    Route::post('/reset-link', 'resetLink')->name('authentication.resetLink');
    Route::get('/reset-password/{email}', 'resetPassword')->name('authenticaion.reset');
    Route::post('/update_password', 'updatePassword')->name('authenticaion.update');
    Route::get('/auth/github/redirect', 'githubredirectToProvider')->name('login.github');
    Route::get('/auth/github/callback', 'githubhandleProviderCallback')->name('login.github.callback');
    Route::get('/auth/google/redirect', 'googleredirectToProvider')->name('login.google');
    Route::get('/auth/google/callback', 'googlehandleProviderCallback')->name('login.google.callback');
});
// ================Authentication Routes======================
// ================Cron Job Routes======================
Route::controller(CronJobController::class)->group(function () {
    Route::get('/design_making', 'DesignMaking')->name('design_making');
    Route::get('/product_making', 'ProductMaking')->name('product_making');
});
// ================Cron Job Routes======================
Route::group(["middleware" => ["authsecurity"]], function () {
    // ================Pages Routes======================
    Route::controller(PagesController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard.dashboard');
        Route::get('/profile', 'profile')->name('dashboard.profile');
        Route::get('/profile_edit', 'editProfile')->name('dashboard.profile.edit');
        Route::put('/profile_update/{id}', 'updateProfile')->name('updateProfile');
        Route::put('/email_update/{id}', 'emailUpdate')->name('emailUpdate');
        Route::put('/password_update/{id}', 'passwordUpdate')->name('passwordUpdate');
        Route::post('/apply_filteration', 'apply_filteration');
        Route::get('/users', 'getAllUsers')->name('users');
        Route::get('change_status/{id}', 'changeStatus')->name('change_status/{id}');
        Route::get('filteration', 'filteration')->name('filteration');
    });
    // ================Pages Routes======================
    // ================Authentication Routes======================
    Route::controller(AuthenticationController::class)->group(function () {
        Route::get('/logout', 'logout')->name('authenticaion.logout');
    });
    // ================Authentication Routes======================
    // ================Image has been Created Routes======================
    Route::controller(ImageProcessing::class)->group(function () {
        Route::get('/getting_csv_data/{file}', 'getting_csv_data');
        Route::put('/getting_font_effect/{font_family}', 'getting_font_effect');
        Route::post('/div', 'addDivToImage');
        Route::get('/getting-data/{title}', 'gettingData');
        Route::post('/image-making/', 'imageMaking');
        Route::post('/apply-text-position', 'applyTextPosition');
        Route::get('/all_templates', 'allTemplates');
        Route::post('/makeZipFile', 'makeZipFile');
        Route::get('/downlaod-zip', 'downloadZip');
    });
    // ================Image has been Created Routes======================
    // ================Resource Controllers======================
    Route::resources([
        'template' => TemplateController::class,
        'csv' => CsvFileController::class,
        'fonts' => FontController::class,
    ]);
    // ================Resource Controllers======================
    // ================Template has been Created Controllers======================
    Route::controller(TemplateController::class)->group(function () {
        Route::get('/gettingData', 'gettingData');
        Route::get('/new-templates', 'newTemplates')->name('templates.new');
        Route::get('/get-font-type/{value}', 'getFontType');
        Route::get('/design-details/{id}', 'getDesignDetails');
        Route::get('/design-download/{id}', 'designsDownload');
        Route::get('/products-download/{id}', 'productsDownload');
        Route::get('/design-products/{id}', 'designProducts');
        Route::post('/make_design_products', 'make_design_products');
        Route::get('/get_all_mokups', 'get_all_mokups');
        Route::post('select_mokup', 'select_mokup');
        Route::get('checeked_all/{id}', 'checeked_all');
        Route::get('checked_single/{id}', 'checked_single');
        Route::get('design-edit/{id}', 'designEdit')->name('design-edit/{id}');
        Route::get('create_products', 'create_products')->name('create_products');
        Route::get('all_products', 'all_products')->name('all_products');
        Route::get('template_products/{template_id}', 'template_products')->name('template_products/{template_id}');
    });
    // ================Template has been Created Controllers======================
    // ================CSV uploaded Controllers======================
    Route::controller(CsvFileController::class)->group(function () {
        Route::get('/download-csv/{filename}', 'downloadCsv')->name('download.csv');
    });
    // ================CSV uploaded Controllers======================
    // ================Fonts Uploaded Controllers======================
    Route::controller(FontController::class)->group(function () {
        Route::get('/download-font/{filename}', 'downloadFont')->name('download.font');
        Route::get('/fonts-download', 'fontsDownload')->name('/fonts-download');
    });
    // ================Fonts Uploaded Controllers======================
    // ================Mockups has been Created Controllers======================
    Route::controller(\App\Http\Controllers\BlankImageController::class)->group(function () {
        Route::get('/mockup/upload', 'upload');
        Route::get('/mockup/view', 'index');
        Route::post('/mockup/store', 'store');
        Route::delete('/mockup/destroy/{id}', 'destroy');
        Route::get('/mockup/details/{id}', 'details');
        Route::get('/mockup/edit/{id}', 'edit');
        Route::post('/mockup/update', 'update');
    });
    // ================Mockups has been Created Controllers======================
});
