<?php

//Lista de Rutas a llamar
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccessController;



use App\Models\Company;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Rutas
Route::resource('access', AccessController::class);

Route::resource('companies', CompanyController::class);


Route::resource('stores', StoreController::class);

Route::resource('users', UserController::class);
