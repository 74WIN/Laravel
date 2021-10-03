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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');

Route::get('/elements', [App\Http\Controllers\ElementController::class, 'index'])->name('elements');
Route::get('/make-elements', [App\Http\Controllers\MakeElementController::class, 'index'])->name('make-elements');

Route::get('/weapons', [App\Http\Controllers\WeaponController::class, 'index'])->name('weapons');
Route::get('/make-weapons', [App\Http\Controllers\MakeWeaponController::class, 'index'])->name('make-weapons');

