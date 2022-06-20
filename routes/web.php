<?php

use App\Http\Controllers\BlogController;
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

Route::get('/view', [ShipController::class, 'get'])->name('ships.view');
Route::get('/tierlist', [ShipController::class, 'index'])->name('ships');

Route::get('/blogs',[BlogController::class, 'index'])->name('blogs');
