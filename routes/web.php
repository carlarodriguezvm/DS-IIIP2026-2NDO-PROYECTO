<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('/categorias', [App\Http\Controllers\CategoriaController::class, 'index']);
route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('cliente.index');;
route::get('/empleados', [App\Http\Controllers\EmpleadoController::class, 'index']);
route::get('/pedidos', [App\Http\Controllers\PedidoController::class, 'index']);
route::get('/productos', [App\Http\Controllers\ProductoController::class, 'index']);    

route::post('/clientes', [App\Http\Controllers\ClienteController::class, 'store'])->name('cliente.store');;

route::delete('/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'destroy'])->name('cliente.destroy');;