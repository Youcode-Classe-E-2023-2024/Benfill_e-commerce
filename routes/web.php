<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get("/add", [CategoryController::class, "index"])->name("category.index");
Route::post("store-form", [ProductController::class, "store"]);

Route::get("products", [ProductController::class, "index"]);

Route::get("edit/{id}", [ProductController::class, "edit"]);

Route::get("delete/{id}", [ProductController::class, "delete"]);
