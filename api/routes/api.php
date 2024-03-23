<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user', [AuthController::class, 'login'])->name('auth');
Route::post('/user', [AuthController::class, 'registration'])->name('auth');

Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/category', [CategoryController::class, 'store'])->name('category');
Route::patch('/category', [CategoryController::class, 'patch'])->name('category');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category');

//product
Route::get('/product', [ProductController::class, 'index'])->name('products');
Route::post('/product', [ProductController::class, 'store'])->name('product');
Route::patch('/product', [ProductController::class, 'patch'])->name('product');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product');
