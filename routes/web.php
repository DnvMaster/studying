<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\DB;

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
Route::get('/',[HomeController::class,'home']);
Route::get('/about',[AboutController::class,'about'])->name('about');
Route::get('/contact',[ContactController::class,'contact'])->name('contact');
# Category-controller
Route::get('/category/all',[CategoryController::class,'allCategory'])->name('all-category');
Route::post('/category/add',[CategoryController::class,'addCategory'])->name('add-category');
Route::get('/category/edit/{id}',[CategoryController::class,'edit']);
Route::post('/category/update/{id}',[CategoryController::class,'update']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $user = DB::table('users')->get();
    return view('dashboard',compact('user'));
})->name('dashboard');
