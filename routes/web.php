<?php

//Lista de Rutas a llamar
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StoreTaxInfoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccessController;



use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Rutas
Route::resource('access', AccessController::class);

Route::resource('companies', CompanyController::class);

Route::resource('stores', StoreController::class);

Route::get('stores', [StoreController::class, 'index'])->name('stores.index');

Route::get('stores/create/{company}', [StoreController::class, 'create'])->name('stores.create');
Route::post('stores/{company}', [StoreController::class, 'store'])->name('stores.store');

Route::resource('stores_tax_info', StoreTaxInfoController::class);
Route::get('stores_tax_info/create/{store}', [StoreTaxInfoController::class, 'create'])
     ->name('stores_tax_info.create');

Route::post('stores_tax_info/{store}', [StoreTaxInfoController::class, 'store'])
     ->name('stores_tax_info.store');






     
Route::resource('users', UserController::class);
