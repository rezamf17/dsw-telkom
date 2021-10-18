<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\NamaProdukController;

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

Route::get('/temp', function () {
    return view('layouts/temp');
});

Route::get('/datatable', function () {
    return view('datatable');
});
Route::get('/profile', function () {
    return view('profile');
});

Route::group(['middleware' => ['auth', 'role:1']], function(){
// Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::get('/KelolaAkun', 'AdminController@index')->name('KelolaAkun');
    // Route::get('/KelolaAkun', [AdminController::class, 'index'])->name('KelolaAkun');
    Route::resource('KelolaAkun', AdminController::class)->names([
        'index'=> 'KelolaAkun',
        'store' => 'KelolaAkun',
        'edit' => 'KelolaAkun/{KelolaAkun}/edit'
    ]);
    Route::resource('KelolaTarget', TargetController::class)->names([
        'store' => 'KelolaTarget'
    ]);
});
Route::group(['middleware' => ['auth', 'role:3']], function(){
    Route::get('/staff', [StaffController::class, 'index'])->name('staff');
    Route::resource('KelolaProduk', ProdukController::class)->names([
        'index'=> 'KelolaProduk',
        'store' => 'KelolaProduk',
    ]);
    Route::resource('KelolaLaporan', LaporanController::class);
    Route::resource('NamaProduk', NamaProdukController::class);
    Route::get('Produk/export/', [ProdukController::class, 'export']);
    Route::post('KelolaProduk/viewExport/{id}', [ProdukController::class, 'viewExport']);
    Route::post('export/{id}', [ProdukController::class, 'export']);
});

// Route::group(['middleware' => ['auth', 'role:3']], function() {
//     Route::resource('');
// });
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
