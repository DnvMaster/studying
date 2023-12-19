<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UsersController;
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
// Проверка и подтверждение электронной почты
Route::get('/email/verify', function ()
{
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

// Controllers
Route::get('/',[HomeController::class,'home']);
Route::get('/about',[AboutController::class,'about'])->name('about');
Route::get('/contact',[ContactController::class,'contact'])->name('contact');

# CategoryController
Route::get('/category/all',[CategoryController::class,'allCategory'])->name('all-category');
Route::post('/category/add',[CategoryController::class,'addCategory'])->name('add-category');
Route::get('/category/edit/{id}',[CategoryController::class,'edit']);
Route::post('/category/update/{id}',[CategoryController::class,'update']);
Route::get('/category/softdelete/{id}',[CategoryController::class,'softDelete']);
Route::get('/category/restore/{id}',[CategoryController::class,'restore']);
Route::get('/category/delete/{id}',[CategoryController::class,'delete']);

# BrandController
Route::get('/brands/all',[BrandController::class,'allBrands'])->name('all-brands');
Route::post('/brand/add',[BrandController::class,'storeBrand'])->name('store-brand');
Route::get('brand/edit/{id}',[BrandController::class,'edit']);
Route::post('brand/update/{id}',[BrandController::class,'update']);
Route::get('/brand/delete/{id}',[BrandController::class,'delete']);

# ImageController
Route::get('/image/all',[ImageController::class,'imagesAll'])->name('all-images');
Route::post('/image/add',[ImageController::class,'imagesAdd'])->name('add-images');

#SliderController
Route::get('/sliders/all',[SliderController::class, 'allSliders'])->name('all-sliders');
Route::get('add/slide',[SliderController::class,'addSlide'])->name('add-slide');
Route::post('store/slide',[SliderController::class,'storeSlide'])->name('store-slide');
# Admin panel
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $user = DB::table('users')->get();
    return view('admin.index',compact('user'));
})->name('dashboard');

Route::get('/user/logout',[UsersController::class,'logout'])->name('user-logout');
