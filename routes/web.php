<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StoreTaxInfoController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Middleware\PreventBackHistory4;



//Cache prevent back history
Route::middleware([PreventBackHistory4::class])->group(function () {
    
    //Breeze rutas
    Route::get('/', function () {
        return redirect()->route('login');
    });
    
    Route::get('/home', [HomeController::class, 'index'])
        ->middleware(['auth'])
        ->name('home'); 
    
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    
    require __DIR__.'/auth.php';

    // CRUDS

    //rutas para compañias
    Route::resource('companies', CompanyController::class);

    //rutas para tax info
    Route::resource('stores_tax_info', StoreTaxInfoController::class);
    Route::resource('stores', StoreController::class);

    //rutas para tiendas
    Route::get('stores', [StoreController::class, 'index'])->name('stores.index');

    Route::get('stores/create/{company}', [StoreController::class, 'create'])->name('store.create');

    Route::post('stores/{company}', [StoreController::class, 'store'])->name('store.store');


    //rutas para tax info
    Route::resource('stores_tax_info', StoreTaxInfoController::class);
    Route::get('stores_tax_info/create/{store}', [StoreTaxInfoController::class, 'create'])
        ->name('stores_tax_info.create');

    Route::post('stores_tax_info/{store}', [StoreTaxInfoController::class, 'store'])
        ->name('stores_tax_info.store');

    
    //rutas para usuarios
    Route::resource('stores.users', \App\Http\Controllers\UserController::class);

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])
        ->name('users.index');
    Route::get('users/create', [\App\Http\Controllers\UserController::class, 'create'])
        ->name('users.create');
    Route::post('users', [\App\Http\Controllers\UserController::class, 'store'])
        ->name('users.store');
    Route::get('users/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit'])
        ->name('users.edit');
    Route::put('users/{user}', [\App\Http\Controllers\UserController::class, 'update'])
        ->name('users.update');
    Route::delete('users/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])
        ->name('users.destroy'); 


        // Listar productos de una tienda
        Route::get('stores/{store}/product_types', [ProductTypeController::class, 'index'])
            ->name('stores.product_types.index');
        
        // Formulario de creación de producto en una tienda
        Route::get('stores/{store}/product_types/create', [ProductTypeController::class, 'create'])
            ->name('stores.product_types.create');
        
        // Guardar producto nuevo
        Route::post('stores/{store}/product_types', [ProductTypeController::class, 'store'])
            ->name('stores.product_types.store');
        
        // Formulario de edición de producto en una tienda
        Route::get('stores/{store}/product_types/{productType}/edit', [ProductTypeController::class, 'edit'])
            ->name('stores.product_types.edit');
        
        // Actualizar producto
        Route::put('stores/{store}/product_types/{productType}', [ProductTypeController::class, 'update'])
            ->name('stores.product_types.update');

        // Mostrar detalles de un producto
        Route::get('stores/{store}/product_types/{productType}', [ProductTypeController::class, 'show'])
            ->name('stores.product_types.show');

        //eliminar producto
        Route::delete('stores/{store}/product_types/{productType}', [ProductTypeController::class, 'destroy'])
            ->name('stores.product_types.destroy');
        

});


