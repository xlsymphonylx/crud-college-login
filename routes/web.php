<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('login');
});


Route::get('/', function () {
    return view('welcome');
})->middleware('auth')->name('home');
//Grupo de rutas pertenecientes al subfijo category, todo relacionado a category va aqui
Route::prefix('/category')->middleware('auth')->group(
    function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categoryIndex'); //esto es la tabla de category 

        Route::get('/register', [CategoryController::class, 'register'])->name('categoryRegister'); // formulario de ingreso 

        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categoryEdit');/* formulario de editar (difiere de update, en que 
        edit es la forma visual de cambiar datos y update es registrar esos datos cambiados en la bd) */


        // Rutas http, peticiones al servidor
        Route::post('/create', [CategoryController::class, 'create'])->name('categoryCreate'); // ruta http de Create category

        // Route::get('/read', function () {
        // })->name('categoryRead'); //ruta http de Read category

        Route::patch('/update/{id}', [CategoryController::class, 'update'])->name('categoryUpdate'); // ruta http de Update category

        Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('categoryDelete'); // ruta http de Delete category
    }
);

Route::prefix('/customer')->middleware('auth')->group(
    function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customerIndex'); //esto es la tabla de customer 

        Route::get('/register', [CustomerController::class, 'register'])->name('customerRegister'); // formulario de ingreso 

        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customerEdit');/* formulario de editar (difiere de update, en que 
        edit es la forma visual de cambiar datos y update es registrar esos datos cambiados en la bd) */


        // Rutas http, peticiones al servidor
        Route::post('/create', [CustomerController::class, 'create'])->name('customerCreate'); // ruta http de Create customer

        // Route::get('/read', [CustomerController::class, ''])->name('customerRead'); //ruta http de Read customer

        Route::patch('/update/{id}', [CustomerController::class, 'update'])->name('customerUpdate'); // ruta http de Update customer

        Route::delete('/delete/{id}', [CustomerController::class, 'delete'])->name('customerDelete'); // ruta http de Delete customer
    }
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
