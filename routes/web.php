<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('pages.home');
});
Route::get('/home', function () {
    return view('pages.home');
});

Route::get("/add", [CategoryController::class, "index"])->name("category.index");
Route::post("store-form", [ProductController::class, "store"]);

Route::get("products", [ProductController::class, "index"]);
Route::get("product/{id}", [ProductController::class, "show"]);

Route::get("edit/{id}", [ProductController::class, "edit"]);
Route::post("update/{id}", [ProductController::class, "update"]);

Route::get("delete/{id}", [ProductController::class, "delete"]);

Route::get("sort", [ProductController::class, "sort"]);

Route::get("register", [RegisterController::class, "create"]);
Route::post("register", [RegisterController::class, "store"])->name("signup");


Route::get("login", [RegisterController::class, "create"]);
Route::post('/logout', [Logoutcontroller::class, 'destroy'])
    ->middleware('auth');
