<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');

Route::get('profile', [App\Http\Controllers\UserController::class, 'index'])->middleware('auth');
Route::get('edit-profile', [App\Http\Controllers\UserController::class, 'edit'])->middleware('auth');
Route::post('update-profile', [App\Http\Controllers\UserController::class, 'profileUpdate']);

//Route::get('make-elements', [App\Http\Controllers\MakeElementController::class, 'create']);
//Route::post('make-elements', [App\Http\Controllers\MakeElementController::class, 'store']);
//Route::get('elementsData', [App\Http\Controllers\MakeElementController::class, 'index']);
//Route::get('edit-elements/{id}', [App\Http\Controllers\MakeElementController::class, 'edit']);
//Route::put('update-elements/{id}', [App\Http\Controllers\MakeElementController::class, 'update']);
//Route::get('delete-elements/{id}', [App\Http\Controllers\MakeElementController::class, 'destroy']);
//Route::get('elements', [App\Http\Controllers\MakeElementController::class, 'getElements']);

Route::get('make-weapons', [App\Http\Controllers\MakeWeaponController::class, 'create']);
Route::post('make-weapons', [App\Http\Controllers\MakeWeaponController::class, 'store']);
Route::get('weaponsData', [App\Http\Controllers\MakeWeaponController::class, 'index'])->middleware('auth');
Route::patch('weaponsData/{id}', [App\Http\Controllers\WeaponController::class, 'changeWeaponStatus'])->middleware('auth');
Route::get('edit-weapons/{id}', [App\Http\Controllers\MakeWeaponController::class, 'edit'])->middleware('auth');
Route::put('update-weapons/{id}', [App\Http\Controllers\MakeWeaponController::class, 'update'])->middleware('auth');
Route::get('delete-weapons/{id}', [App\Http\Controllers\MakeWeaponController::class, 'destroy'])->middleware('auth');
//Route::get('weapons', [App\Http\Controllers\MakeWeaponController::class, 'show']);
Route::get('weapons', [App\Http\Controllers\MakeWeaponController::class, 'getWeapons']);
Route::get('weaponsDetail/{id}', [App\Http\Controllers\MakeWeaponController::class, 'weaponsDetail']);

Route::post('favorite/{id}', [App\Http\Controllers\WeaponController::class, 'favorite'])->name('favoriteWeapon');
Route::post('unfavorite/{id}', [App\Http\Controllers\WeaponController::class, 'unfavorite'])->name('unfavoriteWeapon');

Route::get('favorites', [App\Http\Controllers\WeaponController::class, 'myFavorites'])->middleware('auth');
Auth::routes();


