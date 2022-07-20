<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArchetypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SirenController;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FactionController;
use App\Models\Archetype;

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
Route::get('/admin/ships/add', [ShipController::class, 'addShips'])->middleware(['auth'])->name('add');
Route::get('/admin/factions/add', [FactionController::class, 'addFaction'])->middleware(['auth'])->name('add.faction');
Route::get('/admin/archetypes/add', [ArchetypeController::class, 'addArchetype'])->middleware(['auth'])->name('add.archetype');

//edit views
Route::get('/admin/ships/edit/{id}', [ShipController::class, 'editShip'])->middleware(['auth'])->name('edit');
Route::get('/admin/factions/edit/{id}', [FactionController::class, 'editFaction'])->middleware(['auth'])->name('edit.faction');
Route::get('/admin/archetypes/edit/{id}', [ArchetypeController::class, 'editArchetype'])->middleware(['auth'])->name('edit.archetype');

//post
Route::post('/admin/ships/post', [ShipController::class, 'postShip'])->middleware(['auth'])->name('post');
Route::post('/admin/factions/post', [FactionController::class, 'postFaction'])->middleware(['auth'])->name('post.faction');
Route::post('/admin/archetypes/post', [ArchetypeController::class, 'postArchetype'])->middleware(['auth'])->name('post.archetype');

//update
Route::post('/admin/ships/update', [ShipController::class, 'updateShip'])->middleware(['auth'])->name('update');
Route::post('/admin/factions/update', [FactionController::class, 'updateFaction'])->middleware(['auth'])->name('update.faction');
Route::post('/admin/archetypes/update', [ArchetypeController::class, 'updateArchetype'])->middleware(['auth'])->name('update.archetype');

//delete
Route::get('/admin/ships/delete/{id}', [ShipController::class, 'deleteShip'])->middleware(['auth'])->name('delete');
Route::get('/admin/factions/delete/{id}', [FactionController::class, 'deleteFaction'])->middleware(['auth'])->name('delete.faction');
Route::get('/admin/archetypes/delete/{id}', [ArchetypeController::class, 'deleteArchetype'])->middleware(['auth'])->name('delete.archetype');
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

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');

require __DIR__ . '/auth.php';
