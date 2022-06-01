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

Route::get('/', function(){
    return view('welcome');
});

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

