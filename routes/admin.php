<?php
use App\Http\Controllers\Admin\{
    ArticleController,
    DashboardController,
    GalleryController,
    LibraryTypesController,
    OurClientController,
    PageController,
    ProjectController,
    SettingController,
    LoginController,
    OurTeamController,
    ReportController,
    ServiceController,
    VideoController,
    WebinarController,
    GalleryHighlightsController
};
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group( function ( ) {
    Route::get('admin','loginRoute')->name('login.route');
    Route::get('admin/login','loginForm')->name('login.view');
    Route::post('login-user','login')->name('login');

});
Route::prefix('admin')->middleware('auth')->group(function () {

    Route::controller(PageController::class)->group( function () {
        Route::get('pages','index')->name('pages');
        Route::get('create-page','create')->name('page.create');
        Route::post('save-page','storeUpdatePage')->name('page.save');
        Route::delete('delete-page/{id}','destroy')->name('page.delete');
        Route::get('page/{id}','edit')->name('page.edit');
    } );

    Route::controller(ServiceController::class)->group( function () {
        Route::get('services','index')->name('services');
        Route::get('create-service','create')->name('service.create');
        Route::post('save-service','storeUpdateService')->name('service.save');
        Route::delete('delete-service/{id}','destroy')->name('service.delete');
        Route::get('service/{id}','edit')->name('service.edit');

    } );

    Route::controller(DashboardController::class)->group( function(){
        Route::get('dashboard','dashboardView')->name('dashboard');
        Route::post('logout','logout')->name('logout');
    } );

    Route::controller(SettingController::class)->group( function () {
        Route::get('setting','settingForm')->name('settings');
        Route::post('setting-save','store')->name('settings.store');
    } );

    Route::controller(OurClientController::class)->group( function () {
        Route::get('our-clients','index')->name('our.clients');
        Route::get('our-clients/create','create')->name('our.clients.create');
        Route::post('our-clients/store','store')->name('our.clients.store');
        Route::delete('our-clients/delete/{id}','destroy')->name('our.clients.destroy');
        Route::get('our-clients/edit/{id}','edit')->name('our.clients.edit');
    } );

    Route::controller( ProjectController::class )->prefix('project')->group( function ( ) {
        Route::get('/','index')->name('project.index');
        Route::get('create','create')->name('project.create');
        Route::get('edit/{id}','edit')->name('project.edit');
        Route::post('store','store')->name('project.store');
        Route::delete('delete/{id}','destroy')->name('project.destroy');

    } );

    Route::controller(OurTeamController::class)->group(function(){
        Route::get('our-teams','index')->name('our.teams');
        Route::get('our-teams/create','create')->name('our.teams.create');
        Route::post('our-teams/store','store')->name('our.teams.store');
        Route::delete('our-teams/delete/{id}','destroy')->name('our.teams.destroy');
        Route::get('our-teams/edit/{id}','edit')->name('our.teams.edit');
    });

    Route::controller(LibraryTypesController::class)->group(function(){
        Route::get('library-types','index')->name('library.types');
        Route::get('library/create','create')->name('library.create');
        Route::post('library/store','store')->name('library.store');
        Route::delete('library/delete/{id}','destroy')->name('library.destroy');
        Route::get('library/edit/{id}','edit')->name('library.edit');
    });

    Route::controller(WebinarController::class)->prefix('library-types')->group(function(){
        Route::get('/{type}','index')->name('webinar');
        Route::get('{type}/create','create')->name('webinar.create');
        Route::post('webinar/store','store')->name('webinar.store');
        Route::delete('webinar/delete/{id}','destroy')->name('webinar.destroy');
        Route::get('webinar/edit/{id}','edit')->name('webinar.edit');
    });

    Route::controller(ArticleController::class)->prefix('articles')->group(function(){
        Route::get('{type}/create','create')->name('article.create');
        Route::post('store','store')->name('article.store');
        Route::delete('delete/{id}','destroy')->name('article.destroy');
        Route::get('edit/{id}','edit')->name('article.edit');
    });

    Route::controller(VideoController::class)->prefix('videos')->group(function(){
        Route::get('{type}/create','create')->name('video.create');
        Route::post('store','store')->name('video.store');
        Route::delete('delete/{id}','destroy')->name('video.destroy');
        Route::get('edit/{id}','edit')->name('video.edit');
    });

    Route::controller(ReportController::class)->prefix('report')->group(function(){
        Route::get('{type}/create','create')->name('report.create');
        Route::post('store','store')->name('report.store');
        Route::delete('delete/{id}','destroy')->name('report.destroy');
        Route::get('edit/{id}','edit')->name('report.edit');
    });

    Route::controller(GalleryController::class)->prefix('galleries')->group(function(){
        Route::get('{type}/create','create')->name('gallery.create');
        Route::post('store','store')->name('gallery.store');
        Route::delete('delete/{id}','destroy')->name('gallery.destroy');
        Route::get('edit/{id}','edit')->name('gallery.edit');
    });

    Route::controller(GalleryHighlightsController::class)->prefix('gallery/highlights')->group(function(){
        Route::get('/{id}','index')->name('highlights.index');
        Route::get('{id}/create','create')->name('highlights.create');
        Route::post('store','store')->name('highlights.store');
        Route::post('update','update')->name('highlights.update');
        Route::delete('delete/{id}','destroy')->name('highlights.destroy');
        Route::get('edit/{id}','edit')->name('highlights.edit');
    });


    

});
