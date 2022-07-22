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
use App\Http\Controllers\GearController;
use App\Http\Controllers\HullController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RoleController;

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
Route::get('/admin/roles/add', [RoleController::class, 'addRole'])->middleware(['auth'])->name('add.role');
Route::get('/admin/gears/add', [GearController::class, 'addGear'])->middleware(['auth'])->name('add.gear');
Route::get('/admin/hulls/add', [HullController::class, 'add'])->middleware(['auth'])->name('add.hull');
Route::get('/admin/blogs/add', [BlogController::class, 'add'])->middleware(['auth'])->name('add.blog');

//edit views
Route::get('/admin/ships/edit/{id}', [ShipController::class, 'editShip'])->middleware(['auth'])->name('edit');
Route::get('/admin/factions/edit/{id}', [FactionController::class, 'editFaction'])->middleware(['auth'])->name('edit.faction');
Route::get('/admin/archetypes/edit/{id}', [ArchetypeController::class, 'editArchetype'])->middleware(['auth'])->name('edit.archetype');
Route::get('/admin/roles/edit/{id}', [RoleController::class, 'editRole'])->middleware(['auth'])->name('edit.roll');
Route::get('/admin/positions/edit/{id}', [PositionController::class, 'editPosition'])->middleware(['auth'])->name('edit.position');
Route::get('/admin/gears/edit/{id}', [GearController::class, 'editGear'])->middleware(['auth'])->name('edit.gear');
Route::get('/admin/hulls/edit/{id}', [HullController::class, 'edit'])->middleware(['auth'])->name('edit.hull');
Route::get('/admin/sirens/edit/{id}', [SirenController::class, 'edit'])->middleware(['auth'])->name('edit.siren');
Route::get('/admin/blogs/edit/{id}', [BlogController::class, 'edit'])->middleware(['auth'])->name('edit.blog');

//post
Route::post('/admin/ships/post', [ShipController::class, 'postShip'])->middleware(['auth'])->name('post');
Route::post('/admin/factions/post', [FactionController::class, 'postFaction'])->middleware(['auth'])->name('post.faction');
Route::post('/admin/archetypes/post', [ArchetypeController::class, 'postArchetype'])->middleware(['auth'])->name('post.archetype');
Route::post('/admin/roles/post', [RoleController::class, 'postRole'])->middleware(['auth'])->name('post.role');
Route::post('/admin/gears/post', [GearController::class, 'postGear'])->middleware(['auth'])->name('post.gear');
Route::post('/admin/hulls/post', [HullController::class, 'post'])->middleware(['auth'])->name('post.hull');
Route::post('/admin/blogs/post', [BlogController::class, 'post'])->middleware(['auth'])->name('post.blog');

//update
Route::post('/admin/ships/update', [ShipController::class, 'updateShip'])->middleware(['auth'])->name('update');
Route::post('/admin/factions/update', [FactionController::class, 'updateFaction'])->middleware(['auth'])->name('update.faction');
Route::post('/admin/archetypes/update', [ArchetypeController::class, 'updateArchetype'])->middleware(['auth'])->name('update.archetype');
Route::post('/admin/roles/update', [RoleController::class, 'updateRole'])->middleware(['auth'])->name('update.role');
Route::post('/admin/positions/update', [PositionController::class, 'updatePosition'])->middleware(['auth'])->name('update.position');
Route::post('/admin/gears/update', [GearController::class, 'updateGear'])->middleware(['auth'])->name('update.gear');
Route::post('/admin/hulls/update', [HullController::class, 'update'])->middleware(['auth'])->name('update.hull');
Route::post('/admin/sirens/update', [SirenController::class, 'update'])->middleware(['auth'])->name('update.siren');
Route::post('/admin/blogs/update', [BlogController::class, 'update'])->middleware(['auth'])->name('update.blog');

//delete
Route::get('/admin/ships/delete/{id}', [ShipController::class, 'deleteShip'])->middleware(['auth'])->name('delete');
Route::get('/admin/factions/delete/{id}', [FactionController::class, 'deleteFaction'])->middleware(['auth'])->name('delete.faction');
Route::get('/admin/archetypes/delete/{id}', [ArchetypeController::class, 'deleteArchetype'])->middleware(['auth'])->name('delete.archetype');
Route::get('/admin/roles/delete/{id}', [RoleController::class, 'deleteRole'])->middleware(['auth'])->name('delete.role');
Route::get('/admin/gears/delete/{id}', [GearController::class, 'deleteGear'])->middleware(['auth'])->name('delete.gear');
Route::get('/admin/hulls/delete/{id}', [HullController::class, 'delete'])->middleware(['auth'])->name('delete.hull');
Route::get('/admin/blogs/delete/{id}', [BlogController::class, 'delete'])->middleware(['auth'])->name('delete.blog');


Route::get('/', [LandingController::class, 'index'])->name('home');

Route::get('/siren', [SirenController::class, 'index'])->name('siren');

Route::get('/ships', [ShipController::class, 'index'])->name('ships');
Route::get('/ships/filter', [ShipController::class, 'filter'])->name('filter');
Route::get('/ships/{id}', [ShipController::class, 'get'])->name('ships.view');


Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/search/results', [SearchController::class, 'search'])->name('search');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');

require __DIR__ . '/auth.php';
