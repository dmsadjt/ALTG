<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SirenController;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\SearchController;

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

//get views
Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/admin/ships', [AdminController::class, 'ships'])->middleware(['auth'])->name('ships');
Route::get('/admin/sirens', [AdminController::class, 'sirens'])->middleware(['auth'])->name('sirens');
Route::get('/admin/blogs', [AdminController::class, 'posts'])->middleware(['auth'])->name('posts');
Route::get('/admin/factions', [AdminController::class, 'factions'])->middleware(['auth'])->name('factions');
Route::get('/admin/archetypes', [AdminController::class, 'archetypes'])->middleware(['auth'])->name('archetypes');
Route::get('/admin/roles', [AdminController::class, 'roles'])->middleware(['auth'])->name('roles');
Route::get('/admin/positions', [AdminController::class, 'positions'])->middleware(['auth'])->name('positions');
Route::get('/admin/gears', [AdminController::class, 'gears'])->middleware(['auth'])->name('gears');
Route::get('/admin/hulls', [AdminController::class, 'hulls'])->middleware(['auth'])->name('hulls');

//add views
Route::get('/admin/ships/add', [AdminController::class, 'addShips'])->middleware(['auth'])->name('add');

//edit views
Route::get('/admin/ships/edit/{id}', [AdminController::class, 'editShip'])->middleware(['auth'])->name('edit');

//post
Route::post('/admin/ships/post', [AdminController::class, 'postShip'])->middleware(['auth'])->name('post');

//update
Route::post('/admin/ships/update', [AdminController::class, 'updateShip'])->middleware(['auth'])->name('update');

//delete
Route::get('/admin/ships/delete/{id}', [AdminController::class, 'deleteShip'])->middleware(['auth'])->name('delete');
Route::get('/admin/factions/delete/{id}', [AdminController::class, 'deleteFaction'])->middleware(['auth'])->name('delete.faction');
Route::get('/admin/archetypes/delete/{id}', [AdminController::class, 'deleteArchetype'])->middleware(['auth'])->name('delete.archetype');
Route::get('/admin/roles/delete/{id}', [AdminController::class, 'deleteRole'])->middleware(['auth'])->name('delete.role');
Route::get('/admin/positions/delete/{id}', [AdminController::class, 'deletePosition'])->middleware(['auth'])->name('delete.position');
Route::get('/admin/gears/delete/{id}', [AdminController::class, 'deleteGear'])->middleware(['auth'])->name('delete.gear');
Route::get('/admin/hulls/delete/{id}', [AdminController::class, 'deleteHull'])->middleware(['auth'])->name('delete.hull');


Route::get('/', [LandingController::class, 'index'])->name('home');

Route::get('/siren', [SirenController::class, 'index'])->name('siren');

Route::get('/ships', [ShipController::class, 'index'])->name('ships');
Route::get('/ships/filter', [ShipController::class, 'filter'])->name('filter');
Route::get('/ships/{id}', [ShipController::class, 'get'])->name('ships.view');


Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/search/results', [SearchController::class, 'search'])->name('search');

Route::get('/blogs',[BlogController::class, 'index'])->name('blogs');

require __DIR__.'/auth.php';
