<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/offline', function () {
    return view('offline');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/add_auto', [App\Http\Controllers\dashboard_controller::class, 'add_auto'])->name('projet.admin.add_auto');

Route::get('/list_auto',[App\Http\Controllers\dashboard_controller::class, 'list_auto'])->name('projet.admin.list_auto');

Route::get('/search_auto', [App\Http\Controllers\dashboard_controller::class, 'search_auto'])->name('search_auto');

Route::get('/search',[App\Http\Controllers\dashboard_controller::class, 'search'])->name('search');


Route::get('/show_auto/{id}', [App\Http\Controllers\dashboard_controller::class, 'show_auto'])->name('show_auto');


