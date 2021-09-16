<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::group(['middleware' => ['auth', 'role:1']], function(){
// Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/home', 'HomeController@admin')->name('admin');
    // Route::get('/KelolaAkun', 'AdminController@index')->name('KelolaAkun');
    // Route::get('/KelolaAkun', [AdminController::class, 'index'])->name('KelolaAkun');
    Route::resource('KelolaAkun', AdminController::class)->names([
        'index'=> 'KelolaAkun'
    ]);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
