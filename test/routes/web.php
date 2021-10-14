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

Route::get('make-elements', [App\Http\Controllers\MakeElementController::class, 'create']);
Route::post('make-elements', [App\Http\Controllers\MakeElementController::class, 'store']);
Route::get('elementsData', [App\Http\Controllers\MakeElementController::class, 'index']);
Route::get('edit-elements/{id}', [App\Http\Controllers\MakeElementController::class, 'edit']);
Route::put('update-elements/{id}', [App\Http\Controllers\MakeElementController::class, 'update']);
Route::get('delete-elements/{id}', [App\Http\Controllers\MakeElementController::class, 'destroy']);
Route::get('elements', [App\Http\Controllers\MakeElementController::class, 'show']);

Route::get('make-weapons', [App\Http\Controllers\MakeWeaponController::class, 'create']);
Route::post('make-weapons', [App\Http\Controllers\MakeWeaponController::class, 'store']);
Route::get('weaponsData', [App\Http\Controllers\MakeWeaponController::class, 'index']);
Route::get('edit-weapons/{id}', [App\Http\Controllers\MakeWeaponController::class, 'edit']);
Route::put('update-weapons/{id}', [App\Http\Controllers\MakeWeaponController::class, 'update']);
Route::get('delete-weapons/{id}', [App\Http\Controllers\MakeWeaponController::class, 'destroy']);
Route::get('weapons', [App\Http\Controllers\MakeWeaponController::class, 'show']);
//Route::any('weapons', [App\Http\Controllers\MakeWeaponController::class, 'search']);


Auth::routes();


