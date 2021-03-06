<?php

use App\Http\Controllers\BrancheController;
use App\Http\Controllers\CategoryOfProjectController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\MainBrancheController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

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






Route::prefix('admin')->middleware('auth')->group(function () {
//    home route
    Route::get('/',[HomeController::class,'index'])->name('admin');
//    start user
    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::get('/users/create',[UserController::class,'create'])->name('users.create');
    Route::post('/users/store',[UserController::class,'store'])->name('users.store');
    Route::get('/users/edit/{id}',[UserController::class,'edit'])->name('users.edit');
    Route::get('/users/edit/{id}',[UserController::class,'edit'])->name('user.view');

    Route::post('/users/update/{id}',[UserController::class,'update'])->name('users.update');
    Route::get('/users/delete/{id}',[UserController::class,'destroy'])->name('users.destroy');

//    end user

    Route::resource('main-branches', MainBrancheController::class);
    Route::resource('cities', CityController::class);
    Route::resource('branches', BrancheController::class);
    Route::resource('category-of-projects', CategoryOfProjectController::class);

//    start project
    Route::get('/projects',[ProjectController::class,'index'])->name('projects.index');
    Route::get('/projects/create',[ProjectController::class,'create'])->name('projects.create');
    Route::post('/projects/store',[ProjectController::class,'store'])->name('projects.store');
    Route::get('/projects/edit/{id}',[ProjectController::class,'edit'])->name('projects.edit');
    Route::post('/projects/update/{id}',[ProjectController::class,'update'])->name('projects.update');
    Route::get('/projects/delete/attachment/{id}',[ProjectController::class,'deleteAttachment'])->name('projects.delete.attachment');
    Route::get('/projects/delete/{id}',[ProjectController::class,'delete'])->name('projects.delete');


//    end project

}

    );

