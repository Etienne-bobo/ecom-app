<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontProductListController;
use App\Http\Controllers\CartController;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// })->name('home');
Route::get('/', [ FrontProductListController::class, 'index'])->name("frontHome");
Route::get('vixiza/product/{id}', [ FrontProductListController::class, 'show'])->name("showProduct");
Route::get('vixiza/category/{name}', [ FrontProductListController::class, 'allProducts'])->name("allProducts");
Route::get('vixiza/addToCart/{product}', [ CartController::class, 'addToCart'])->name("addToCart");
Route::get('vixiza/cart', [ CartController::class, 'showCart'])->name("showCart");
Route::post('vixiza/cart/update/{product}', [ CartController::class, 'updateCart'])->name("updateCart");
Route::post('vixiza/cart/remove/{product}', [ CartController::class, 'removeCart'])->name("removeCart");
Route::get('vixiza/checkout/{amount}', [ CartController::class, 'checkout'])->middleware('auth')->name("checkout");
Route::post('/charge', [ CartController::class, 'charge'])->name("chargeAmount");

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');

Route::group(['middleware' => ['auth', 'isAdmin']], function(){
    Route::get('dashboard', [ ProductController::class, 'dashboard'])->name("dashboard");
    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubcategoryController::class);
    Route::resource('product', ProductController::class);
    Route::get('subcategories/{id}', [ ProductController::class, 'loadSubCategories'])->name("loadSubCategories");
});
