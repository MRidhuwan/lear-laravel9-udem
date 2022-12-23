<?php

use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;

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

Route::get('/', [PagesController::class, 'home'])->name('welcome');
Route::get('/cart', [PagesController::class, 'cart'])->name('cart');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login')
->middleware('guest');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register')
->middleware('guest');


Route::post('/register', [AuthController::class, 'PostRegister'])->name('register')
->middleware('guest');
Route::post('/login', [AuthController::class, 'PostLogin'])->name('login')
->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')
->middleware('auth');

// Route::get('/adminpanel', [AdminController::class, 'dashboard'])
// ->name('dashboard');

Route::group(['prefix' => 'adminpanel', 'middleware' => 'admin'], function () {

    Route::get('/', [AdminController::class, 'dashboard'])->name('adminpanel');

    #products
Route::group(['prefix' => 'products'], function(){

    Route::get('/', [ProductController::class, 'index'])->name('adminpanel.products');
    Route::get('/create', [ProductController::class, 'create'])->name('adminpanel.product.create');
    Route::post('/create', [ProductController::class, 'store'])->name('adminpanel.product.store');

});

Route::group(['prefix' => 'categories'], function(){

    Route::get('/', [CategoryController::class, 'index'])->name('adminpanel.categories');
    Route::post('/', [CategoryController::class, 'store'])->name('adminpanel.category.store');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('adminpanel.category.destroy');

});

Route::group(['prefix' => 'colors'], function(){

    Route::get('/', [ColorController::class, 'index'])->name('adminpanel.colors');
    Route::post('/', [ColorController::class, 'store'])->name('adminpanel.colors.store');
    Route::delete('/{id}', [ColorController::class, 'destroy'])->name('adminpanel.colors.destroy');

});

});
