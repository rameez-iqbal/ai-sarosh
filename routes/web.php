<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\FrontEndController;

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


Route::controller(FrontEndController::class)->group(function () {
    Route::get('/', 'home')->name('homepage');
    // Route::get('/home','home')->name('homepage');
    Route::get('our-work', 'projects')->name('project');
    Route::get('our-team', 'ourTeamView')->name('team');
    Route::get('library', 'library')->name('library');
    Route::get('webinars', 'webinars')->name('webinars');
    Route::get('articles', 'articles')->name('articles');
    Route::get('gallery', 'gallery')->name('gallery');
    Route::get('about-us', 'aboutUs')->name('aboutUs');
    Route::get('reports', 'reports')->name('reports');
    Route::get('videos', 'videos')->name('videos');
    // Route::get('13th-international-public-health-conference', 'PHCConference')->name('13th-international-public-health-conference');
    // Route::get('canadian-conference-on-global-health-2023', 'canadianConference')->name('canadian-conference-on-global-health-2023');
    // Route::get('global-health-security-summit-islamabad', 'ghsSummit')->name('global-health-security-summit-islamabad');
    // Route::get('ai4gh-nairobi-kenya-2023', 'al4gh')->name('ai4gh-nairobi-kenya-2023');
    // Route::get('women-deliver-conference', 'wdc')->name('wdc');
    Route::get('contact-us', 'contactUs')->name('contact-us');
    // Route::get('co-design-workshop-day1', 'codesign')->name('codesign');
    // Route::get('co-design-workshop-day2', 'codesignDay2')->name('codesign.day2');
    // Route::get('co-design-workshop-day3', 'codesignDay3')->name('codesign.day3');
    // Route::get('co-design-workshop-day4', 'codesignDay4')->name('codesign.day4');

    // Dynamic Route for Gallery
    Route::get('gallery/{slug}/{day?}',[FrontEndController::class,'getGalleryConferences'])->name('gallery.conferences');
    // Route::get('gallery/{slug}/{day?}',[FrontEndController::class,'getGalleryConferences'])->name('gallery.conferences');
});

Route::get('/clear', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('storage:link');
    Artisan::call('optimize:clear');
    return [
        'Config cache has clear successfully!',
        'Application cache has clear successfully!',
        'Route cache has clear successfully!',
        'View cache has clear successfully!',
        'storage link successfully!',
        'Configuration cached successfully!'
    ];
});
