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

Route::get('/list_facture',[App\Http\Controllers\dashboard_controller::class, 'list_facture'])->name('projet.admin.list_facture');

Route::get('/search_facture', [App\Http\Controllers\dashboard_controller::class, 'search_facture'])->name('search_facture');

Route::get('/search',[App\Http\Controllers\dashboard_controller::class, 'search'])->name('search');

Route::post('/form_add_facture', [App\Http\Controllers\dashboard_controller::class, 'form_add_facture'])->name('form_add_facture');

Route::post('/form_add_sci', [App\Http\Controllers\dashboard_controller::class, 'form_add_sci'])->name('form_add_sci');


/********************************************************************* */
Route::get('/ac/{id}', [App\Http\Controllers\dashboard_controller::class, 'ac'])->name('ac');

Route::get('/ev/{id}', [App\Http\Controllers\dashboard_controller::class, 'ev'])->name('ev');

Route::get('/pm/{id}', [App\Http\Controllers\dashboard_controller::class, 'pm'])->name('pm');


Route::get('/sci_pm/{id}', [App\Http\Controllers\dashboard_controller::class, 'sci_pm'])->name('sci_pm');

Route::get('/sci_ar/{id}', [App\Http\Controllers\dashboard_controller::class, 'sci_ar'])->name('sci_ar');

/********************************************************************* */




Route::get('/create_pdf', [App\Http\Controllers\dashboard_controller::class, 'create_pdf'])->name('create_pdf');

Route::get('/facture', [App\Http\Controllers\dashboard_controller::class, 'facture']);

Route::get('generate-pdf', [App\Http\Controllers\dashboard_controller::class, 'generatePDF']);

