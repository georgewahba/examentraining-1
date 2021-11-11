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

Route::get('/', function () {
    return view('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/stockroom/create', [App\Http\Controllers\StockroomsController::class, 'create'])->name('');

Route::post('/stockroom', [App\Http\Controllers\StockroomsController::class, 'store'])->name('');

Route::get('/stockroom/show', [App\Http\Controllers\StockroomsController::class, 'showall'])->name('');

Route::get('/allstockroom', [App\Http\Controllers\StockroomsController::class, 'showall'])->name('');

Route::get('/stockroom/show/{id}', [App\Http\Controllers\StockroomsController::class, 'show'])->name('');

Route::get('/stockroom/edit/{id}', [App\Http\Controllers\StockroomsController::class, 'edit'])->name('');

Route::post('/stockroom/editname/{id}', [App\Http\Controllers\StockroomsController::class, 'editname'])->name('');

Route::post('/stockroom/destroy/{id}', [App\Http\Controllers\StockroomsController::class, 'destroy'])->name('');

Route::get('/flower/create', [App\Http\Controllers\FlowersController::class, 'create'])->name('');

Route::post('/flowers', [App\Http\Controllers\FlowersController::class, 'store'])->name('');

Route::get('/flower/show', [App\Http\Controllers\FlowersController::class, 'showall'])->name('');

Route::get('/allflower', [App\Http\Controllers\FlowersController::class, 'showall'])->name('');

Route::get('/flower/show/{id}', [App\Http\Controllers\FlowersController::class, 'show'])->name('');

Route::get('/flower/edit/{id}', [App\Http\Controllers\FlowersController::class, 'edit'])->name('');

Route::post('/flower/editname/{id}', [App\Http\Controllers\FlowersController::class, 'editname'])->name('');

Route::post('/flower/destroy/{id}', [App\Http\Controllers\FlowersController::class, 'destroy'])->name('');

Route::get('/stockroomflowers/create/{id}', [App\Http\Controllers\StockroomFlowersController::class, 'create'])->name('');

Route::post('/stockroomflowers', [App\Http\Controllers\StockroomFlowersController::class, 'store'])->name('');

Route::get('/stockroomflowers/edit/{id}', [App\Http\Controllers\StockroomFlowersController::class, 'edit'])->name('');

Route::post('/stockroomflowers/editname/{id}', [App\Http\Controllers\StockroomFlowersController::class, 'editname'])->name('');









