<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PagesController;
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

Route::get('/','App\Http\Controllers\HomeController@index');

Auth::routes();

Route::get('/admin', function(){
    return view('admin.index');
})->middleware('admin');


Route::resource('/admin/pages', 'App\Http\Controllers\Admin\PagesController', ['except' => [
    'show'
]]);

Route::resource('/admin/banner', 'App\Http\Controllers\Admin\BannerController', ['except' => [
    'show'
]]);

Route::resource('/admin/blog', 'App\Http\Controllers\Admin\Postcontroller', ['except' => [
    'show'
]]);


Route::resource('/admin/partners', 'App\Http\Controllers\Admin\PartnersController', ['except' => [
    'show'
]]);

Route::resource('/admin/services', 'App\Http\Controllers\Admin\ServicesController', ['except' => [
    'show'
]]);

Route::resource('/admin/category', 'App\Http\Controllers\Admin\CategoryController', ['except' => [
    'show'
]]);

Route::resource('/admin/portfolio', 'App\Http\Controllers\Admin\PortfolioController', ['except' => [
    'show'
]]);

Route::resource('/admin/pcategory', 'App\Http\Controllers\Admin\PortfolioCategoryController', ['except' => [
    'show'
]]);

Route::resource('/admin/users', 'App\Http\Controllers\Admin\UsersController', ['except' => [
    'show', 'create', 'store'
]]);

Route::resource('/admin/gallery', 'App\Http\Controllers\Admin\ImageGalleryController', ['except' => [
    'show'
]]); 


Route::group(['middleware' => 'auth'], function() {
    Route::get('/admin/settings',[App\Http\Controllers\Admin\SettingsController::class, 'showChangePasswordGet'])->name('changePasswordGet');
    Route::post('/admin/settings',[App\Http\Controllers\Admin\SettingsController::class, 'changePasswordPost'])->name('changePasswordPost');
});

Route::post('/admin/settings',[App\Http\Controllers\Admin\SettingsController::class, 'upload'])->name('changePasswordPost');

Route::resource('/admin/menu', 'App\Http\Controllers\Admin\MenuController');
Route::get('manage-menus/{id?}',[App\Http\Controllers\Admin\MenuController::class,'index']);
Route::post('create-menu',[App\Http\Controllers\Admin\MenuController::class,'store']);
Route::get('add-categories-to-menu',[App\Http\Controllers\Admin\MenuController::class,'addCategory']);	
Route::get('add-post-to-menu',[App\Http\Controllers\Admin\MenuController::class,'addPostToMenu']);
Route::get('add-custom-link',[App\Http\Controllers\Admin\MenuController::class,'addCustomLink']);
Route::get('save-menu',[App\Http\Controllers\Admin\MenuController::class,'save']);	
Route::post('update-menuitem/{id}',[App\Http\Controllers\Admin\MenuController::class,'updateMenuItem']);		
Route::get('delete-menuitem/{id}/{key}/{in?}',[App\Http\Controllers\Admin\MenuController::class,'deleteMenuItem']);
Route::get('delete-menu/{id}',[App\Http\Controllers\Admin\MenuController::class,'destroy']);



Route::get('/blog', [App\Http\Controllers\BlogPostController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [App\Http\Controllers\BlogPostController::class, 'view'])->name('blog.view');


Route::get('/partner', [App\Http\Controllers\PartnerController::class, 'index'])->name('partner');
Route::get('/partner/{slug}', [App\Http\Controllers\PartnerController::class, 'view'])->name('partner.view');

Route::get('/services', [App\Http\Controllers\ServicesController::class, 'index'])->name('services');
Route::get('/services/{slug}', [App\Http\Controllers\ServicesController::class, 'view'])->name('services.view');

Route::get('/portfolio', [App\Http\Controllers\PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{slug}', [App\Http\Controllers\PortfolioController::class, 'view'])->name('portfolio.view');

Route::get('/artisan-link', function () {
    Artisan::call('storage:link');
});


