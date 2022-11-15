<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WarehouseController;

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

Route::controller(WarehouseController::class)->group(function () {
    Route::prefix('warehouse')->group(function () {
        Route::get('', 'index')->name('warehouse.index');
        Route::get('create', 'create')->name('warehouse.create');
        Route::post('store', 'store')->name('warehouse.store');
        Route::get('show/{id}', 'show')->name('warehouse.show');
        Route::get('edit/{id}', 'edit')->name('warehouse.edit');
		Route::patch('update/{id}', 'update')->name('warehouse.update');
        Route::delete('destroy/{id}', 'destroy')->name('warehouse.destroy');
    });
});

Route::controller(MerekController::class)->group(function () {
    Route::prefix('merek')->group(function () {
        Route::get('', 'index')->name('merek.index');
        Route::get('create', 'create')->name('merek.create');
		Route::post('store', 'store')->name('merek.store');
        Route::get('show/{id}', 'show')->name('merek.show');
        Route::get('edit/{id}', 'edit')->name('merek.edit');
		Route::patch('update/{id}', 'update')->name('merek.update');
        Route::delete('destroy/{id}', 'destroy')->name('merek.destroy');
    });
});

Route::controller(ProductController::class)->group(function () {
    Route::prefix('product')->group(function () {
        Route::get('', 'index')->name('product.index');
        Route::get('create', 'create')->name('product.create');
		Route::post('store', 'store')->name('product.store');
        Route::get('show/{id}', 'show')->name('product.show');
        Route::get('edit/{id}', 'edit')->name('product.edit');
		Route::patch('update/{id}', 'update')->name('product.update');
        Route::delete('destroy/{id}', 'destroy')->name('product.destroy');
    });
});