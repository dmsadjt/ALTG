<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SirenController;
use App\Http\Controllers\ShipController;

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
    return view('landing-page');
});

Route::get('/siren', [SirenController::class, 'index'])->name('siren');

Route::get('/id', [ShipController::class, 'get'])->name('ship');
Route::get('/tierlist', [ShipController::class, 'index'])->name('list');
