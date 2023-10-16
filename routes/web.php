<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/trash', [ProductController::class, 'trash'])->name('products.trash');
Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('products.store');
Route::get('product/{id}/view', [ProductController::class, 'view']);
Route::get('product/{id}/edit', [ProductController::class, 'edit']);
Route::put('product/{id}/update', [ProductController::class, 'update']);
Route::get('product/{id}/delete', [ProductController::class, 'delete']);
Route::get('product/{id}/force-delete', [ProductController::class, 'force_delete']);
Route::get('product/{id}/restore', [ProductController::class, 'restore']);


