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


Route::resource('/admin/blog', 'App\Http\Controllers\Admin\Postcontroller', ['except' => [
    'show'
]]);



Route::resource('/admin/users', 'App\Http\Controllers\Admin\UsersController', ['except' => [
    'show', 'create', 'store'
]]);


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


