<?php

use App\Http\Controllers\BrancheController;
use App\Http\Controllers\CategoryOfProjectController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\MainBrancheController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/projects', function () {
    return view('dashboard.pages.main_branches.create');
});

Route::resource('main-branches', MainBrancheController::class);
Route::resource('cities', CityController::class);
Route::resource('branches', BrancheController::class);
Route::resource('category-of-projects', CategoryOfProjectController::class);