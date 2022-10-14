<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\JabatanController;

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
//     // return redirect()->route('products');
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard.index');
});
// ->middleware('auth');
// Route::get('products/cari',[ProductController::class, 'cari'])->name('products.cari');

// Route::resource('products', ProductController::class);

// Manage products
Route::get('products', [ProductController::class, 'index'])->name('products.indexs');
// Route::get('products/show', [ProductController::class, 'show'])->name('products.show');
Route::get('products/show/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products/create', [ProductController::class, 'store'])->name('products.store');
Route::get('products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('products/edit/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/destroy/{id}',[ProductController::class, 'destroy'])->name('products.destroy');

// Manage unitkerjas
Route::get('unitkerjas', [UnitKerjaController::class, 'index'])->name('unitkerjas.indexs');
// Route::get('unitkerjas/show', [UnitKerjaController::class, 'show'])->name('unitkerjas.show');
Route::get('unitkerjas/show/{id}', [UnitKerjaController::class, 'show'])->name('unitkerjas.show');
Route::get('unitkerjas/create', [UnitKerjaController::class, 'create'])->name('unitkerjas.create');
Route::post('unitkerjas/create', [UnitKerjaController::class, 'store'])->name('unitkerjas.store');
Route::get('unitkerjas/edit/{id}', [UnitKerjaController::class, 'edit'])->name('unitkerjas.edit');
Route::post('unitkerjas/edit/{id}', [UnitKerjaController::class, 'update'])->name('unitkerjas.update');
Route::delete('unitkerjas/destroy/{id}',[UnitKerjaController::class, 'destroy'])->name('unitkerjas.destroy');

// Manage jabantans
Route::get('jabatans', [JabatanController::class, 'index'])->name('jabatans.indexs');
// Route::get('jabatans/show', [JabatanController::class, 'show'])->name('jabatans.show');
Route::get('jabatans/show/{id}', [JabatanController::class, 'show'])->name('jabatans.show');
Route::get('jabatans/create', [JabatanController::class, 'create'])->name('jabatans.create');
Route::post('jabatans/create', [JabatanController::class, 'store'])->name('jabatans.store');
Route::get('jabatans/edit/{id}', [JabatanController::class, 'edit'])->name('jabatans.edit');
Route::post('jabatans/edit/{id}', [JabatanController::class, 'update'])->name('jabatans.update');
Route::delete('jabatans/destroy/{id}',[JabatanController::class, 'destroy'])->name('jabatans.destroy');
