<?php

use App\Http\Controllers\BeneficiariesProjectController;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\BrancheController;
use App\Http\Controllers\CategoryOfProjectController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\MainBrancheController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VawtcherController;
use App\Models\BeneficiariesProject;

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



Route::prefix('admin')->group(function () {
    Route::resource('main-branches', MainBrancheController::class);
Route::resource('cities', CityController::class);
Route::resource('branches', BrancheController::class);
Route::resource('category-of-projects', CategoryOfProjectController::class);
Route::resource('donors', DonorController::class);
Route::resource('beneficiareis', BeneficiaryController::class);
Route::resource('beneficiareis-projects', BeneficiariesProjectController::class);
Route::post('update_status', [BeneficiaryController::class, 'updateStatus'])->name('update_status');
Route::resource('vawtchers', VawtcherController::class);

//    start user
    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::get('/users/create',[UserController::class,'create'])->name('users.create');
    Route::get('/users/store',[UserController::class,'stor'])->name('users.store');


//    end user
//    start project
    Route::get('/projects',[ProjectController::class,'index'])->name('projects.index');
    Route::get('/projects/create',[ProjectController::class,'create'])->name('projects.create');}
//    end project
    );

