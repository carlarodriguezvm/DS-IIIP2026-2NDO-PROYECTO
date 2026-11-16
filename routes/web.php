<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

#CATEGORIAS
route::get('/categorias', [App\Http\Controllers\CategoriaController::class, 'index'])->name('categoria.index');
route::post('/categorias', [App\Http\Controllers\CategoriaController::class, 'store'])->name('categoria.store');
route::delete('/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'destroy'])->name('categoria.destroy');
route::put('/categorias', [App\Http\Controllers\CategoriaController::class, 'update'])->name('categoria.update');

#EMPLEADOS
route::get('/empleados', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('empleado.index');
route::post('/empleados', [App\Http\Controllers\EmpleadoController::class, 'store'])->name('empleado.store');
route::delete('/empleados/{id}', [App\Http\Controllers\EmpleadoController::class, 'destroy'])->name('empleado.destroy');
route::put('/empleados', [App\Http\Controllers\EmpleadoController::class, 'update'])->name('empleado.update');

#RUTAS PARA CLIENTES
route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('cliente.index');;
route::post('/clientes', [App\Http\Controllers\ClienteController::class, 'store'])->name('cliente.store');;
route::delete('/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'destroy'])->name('cliente.destroy');;
route::put('/clientes/{cliente}', [App\Http\Controllers\ClienteController::class, 'update'])->name('cliente.update');;

#BODEGAAAS
route::get('/bodegas', [App\Http\Controllers\BodegaController::class, 'index'])->name('bodega.index');;
route::post('/bodegas', [App\Http\Controllers\BodegaController::class, 'store'])->name('bodega.store');;
route::delete('/bodegas/{bodega}', [App\Http\Controllers\BodegaController::class, 'destroy'])->name('bodega.destroy');;
route::put('/bodegas/{bodega}', [App\Http\Controllers\BodegaController::class, 'update'])->name('bodega.update');

#PEDIDOS
route::get('/pedidos', [App\Http\Controllers\PedidoController::class, 'index'])->name('pedido.index');
route::post('/pedidos', [App\Http\Controllers\PedidoController::class, 'store'])->name('pedido.store');
route::delete('/pedidos/{id}', [App\Http\Controllers\PedidoController::class, 'destroy'])->name('pedido.destroy');
route::put('/pedidos', [App\Http\Controllers\PedidoController::class, 'update'])->name('pedido.update');

#Productos
route::get('/productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('producto.index');
route::post('/productos', [App\Http\Controllers\ProductoController::class, 'store'])->name('producto.store');
route::delete('/productos/{id}', [App\Http\Controllers\ProductoController::class, 'destroy'])->name('producto.destroy');
route::put('/productos/{producto}', [App\Http\Controllers\ProductoController::class, 'update'])->name('producto.update');

#Proovedores
route::get('/proovedores', [App\Http\Controllers\ProovedorController::class, 'index'])->name('proovedor.index');
route::post('/proovedores', [App\Http\Controllers\ProovedorController::class, 'store'])->name('proovedor.store');
route::delete('/proovedores/{id}', [App\Http\Controllers\ProovedorController::class, 'destroy'])->name('proovedor.destroy');
route::put('/proovedores/{proovedores}', [App\Http\Controllers\ProovedorController::class, 'update'])->name('proovedor.update');
require __DIR__.'/auth.php';
