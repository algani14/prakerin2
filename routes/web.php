<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin' , 'middleware' =>['auth']] , function(){

Route::get('/',function() {
    return view('admin.index');
});
Route::resource('provinsi',ProvinsiController::class);
Route::resource('kota',KotaController::class);
Route::resource('kecamatan',KecamatanController::class);
Route::resource('desa',DesaController::class);
Route::resource('rw',RwController::class);
Route::resource('kasus',KasusController::class);
Route::resource('users', UserController::class)->middleware('admin');

});
Route::resource('/',FrontendController::class);

use App\Http\Controllers\ReportController;
Route::get('report', [ReportController::class, 'getReportProvinsi']);
Route::post('laporanprov', [ReportController::class, 'ReportProvinsi']);
Route::get('pdfkasus', [ReportController::class,'kasus'])->name('pdfkasus');
