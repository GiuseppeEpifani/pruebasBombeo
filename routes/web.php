<?php

use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/view_test', function () {
    return view('view_test');
})->name('view_test');
Route::post('/registerBombTest', App\Http\Controllers\RegisterBombTest::class)->name('registerBombTest');
Route::post('/registerFieldBombTest', App\Http\Controllers\RegisterFieldBombTest::class)->name('registerFieldBombTest');
Route::post('/finallyBombTest', App\Http\Controllers\FinallyBombTest::class)->name('finallyBombTest');
Route::get('/getBombTest', App\Http\Controllers\GetBombTest::class)->name('getBombTest');
Route::get('/getFieldBombTest', App\Http\Controllers\GetFieldBombTest::class)->name('getFieldBombTest');
Route::post('/deleteBombTest', App\Http\Controllers\DeleteBombTest::class)->name('deleteBombTest');
