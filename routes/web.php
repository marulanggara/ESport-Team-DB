<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DivisiController;
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

Route::get('/', [PlayerController::class, 'home'])->name('player.home');
Route::get('/home', [PlayerController::class, 'home'])->name('player.home');
Route::get('/cariteam', [PlayerController::class, 'cariteam'])->name('team.cari');

Route::middleware(['auth'])->group(function () {
    Route::get('/team', [TeamController::class, 'index'])->name('team.index');
    Route::get('/team/add', [TeamController::class, 'create'])->name('team.create');
    Route::post('store', [TeamController::class, 'store'])->name('team.store');
    Route::get('edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
    Route::post('update/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::post('delete/{id}', [TeamController::class, 'delete'])->name('team.delete');

    Route::post('/team/softdelete/{id}', [TeamController::class, 'softDelete'])->name('team.softdelete');
    Route::get('/team/restore{id}', [TeamController::class, 'restore'])->name('team.restore');
    Route::get('/team/bin', [TeamController::class, 'Teambin'])->name('team.bin');

    Route::get('/divisi', [DivisiController::class, 'index'])->name('divisi.index');
    Route::get('/divisi/add', [DivisiController::class, 'create'])->name('divisi.create');
    Route::post('/divisi/store', [DivisiController::class, 'store'])->name('divisi.store');
    Route::get('/divisi/edit/{id}', [DivisiController::class, 'edit'])->name('divisi.edit');
    Route::post('/divisi/update/{id}', [DivisiController::class, 'update'])->name('divisi.update');
    Route::post('divisi/delete/{id}', [DivisiController::class, 'delete'])->name('divisi.delete');

    Route::post('/divisi/softdelete/{id}', [DivisiController::class, 'softDelete'])->name('divisi.softdelete');
    Route::get('/divisi/restore{id}', [DivisiController::class, 'restore'])->name('divisi.restore');
    Route::get('/divisi/bin', [DivisiController::class, 'Divisibin'])->name('divisi.bin');


    Route::get('/player', [PlayerController::class, 'index'])->name('player.index');
    Route::get('/player/add', [PlayerController::class, 'create'])->name('player.create');
    Route::post('/player/store', [PlayerController::class, 'store'])->name('player.store');
    Route::get('/player/edit/{id}', [PlayerController::class, 'edit'])->name('player.edit');
    Route::post('/player/update/{id}', [PlayerController::class, 'update'])->name('player.update');
    Route::post('player/delete/{id}', [PlayerController::class, 'delete'])->name('player.delete');

    Route::post('/player/softdelete/{id}', [PlayerController::class, 'softDelete'])->name('player.softdelete');
    Route::get('/player/restore{id}', [PlayerController::class, 'restore'])->name('player.restore');
    Route::get('/player/bin', [PlayerController::class, 'Playerbin'])->name('player.bin');
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
