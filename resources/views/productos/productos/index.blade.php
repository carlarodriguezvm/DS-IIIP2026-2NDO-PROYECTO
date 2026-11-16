<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

</head>

<body>

{{-- NAV BAR  --}}
    <div class="container-navbar">
        <nav class="navbar sm:navbar-expand bg-1 fg-2">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">HOME</a>
                <button class="btn-icon navbar-toggler" type="button" data-bs-toggle="drawer"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" aria-hidden="true"></span>
                </button>
                <dialog class="drawer drawer-end" tabindex="-1" id="navbarNavAltMarkup"
                    aria-labelledby="navbarNavAltMarkupLabel">
                    <div class="drawer-header">
                        <h5 class="drawer-title" id="navbarNavAltMarkupLabel">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="drawer" aria-label="Close"></button>
                    </div>
                    <div class="drawer-body">
                        <div class="nav nav-pills navbar-nav">
                            <a class="nav-link" href="{{ route('cliente.index') }}">Clientes</a>
                            <a class="nav-link" href="{{ route('empleado.index') }}">Empleados</a>
                            <a class="nav-link" href="{{ route('bodega.index') }}">Bodegas</a>
                            <a class="nav-link" href="{{ route('categoria.index') }}">Categorias</a>
                            <a class="nav-link active" aria-current="page" href="{{ route('producto.index') }}">Productos</a>
                            <a class="nav-link" href="{{ route('pedido.index') }}">Pedidos</a>
                        </div>
                    </div>
                </dialog>
            </div>
        </nav>
    </div>

{{-- BOTON DE AÑADIR Y SU DIALOGO PARA GUARDAR, STORE --}}
    <div class="container-fluid m-3">
        <div class="d-flex justify-content-end m-5">

            <button type="button" class="btn-solid theme-primary rounded-pill" onclick="document.getElementById('aniadirproductoDialog').showModal()">
                Añadir Producto
            </button>

            <dialog class="dialog dialog-scrollable" id="aniadirproductoDialog">
                <form action="{{ route('producto.store') }}" method="POST"
                    class="d-flex flex-column overflow-hidden h-100 m-0">
                    @csrf
                    <div class="dialog-header flex-shrink-0">
                        <h1 class="dialog-title">Añadir Producto</h1>
                        <button type="button" class="btn-close" onclick="document.getElementById('aniadirproductoDialog').close()" aria-label="Close"></button>
                    </div>
                    <div class="dialog-body">

                        <div class="mb-3">
                            <label for="categoria_id_add" class="form-label">Categoría ID</label>
                            <input type="number" class="form-control" name="categoria_id" value="{{ old('categoria_id') }}"
                                id="categoria_id_add" placeholder="1">
                        </div>

                        <div class="mb-3">
                            <label for="codigo_add" class="form-label">Código</label>
                            <input type="text" class="form-control" name="codigo" value="{{ old('codigo') }}"
                                id="codigo_add" placeholder="PROD-001">
                        </div>

                        <div class="mb-3">
                            <label for="nombre_add" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}"
                                id="nombre_add" placeholder="Laptop">
                        </div>

                        <div class="mb-3">
                            <label for="descripcion_add" class="form-label">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="descripcion_add">{{ old('descripcion') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="precio_add" class="form-label">Precio</label>
                            <input type="number" step="1.00" class="form-control" name="precio" value="{{ old('precio') }}"
                                id="precio_add" placeholder="0.00">
                        </div>

                        <div class="mb-3">
                            <label for="stock_add" class="form-label">Stock</label>
                            <input type="number" class="form-control" name="stock" value="{{ old('stock', 0) }}"
                                id="stock_add" placeholder="10">
                        </div>

                        <div class="mb-3">
                            <label for="estado_add" class="form-label">Estado</label>
                            <select class="form-control" name="estado" id="estado_add">
                                <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                                <option value="inactivo" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>

                    </div>
                    <div class="dialog-footer">
                        <button type="button" class="btn-solid theme-secondary"
                            onclick="document.getElementById('aniadirproductoDialog').close()">Cerrar</button>
                        <button type="submit" class="btn-solid theme-primary">Guardar Cambios</button>
                    </div>
                </form>
            </dialog>
        </div>
    </div>

{{-- MENSAJE DE EXITO --}}
    @if (session('status'))
        <div class="alert theme-success m-3" role="alert">
            <p> {{ session('status') }} </p>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

{{-- MENSAJE DE ERROR PARA AÑADIR --}}
    @if ($errors->any())
        <div class="card card-subtle theme-danger m-3">
            <div class="card-header">
                ERROR
            </div>
            <div class="card-body">
                <h4 class="card-title">Se encontraron los siguientes errores: </h4>
                <p class="card-text">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </p>
                <a href="{{ route('producto.index') }}" class="btn-solid theme-warning">Entendido</a>
            </div>
        </div>
    @endif

{{-- TABLA --}}
    <div class="container-fluid">
        <div class="border rounded overflow-hidden">
            <table class="table theme-inverse">
                <thead>
                    <tr>
                        <th class="theme-primary">#</th>
                        <th class="theme-primary">CATEGORIA ID</th>
                        <th class="theme-primary">CODIGO</th>
                        <th class="theme-primary">NOMBRE</th>
                        <th class="theme-primary">DESCRIPCION</th>
                        <th class="theme-primary">PRECIO</th>
                        <th class="theme-primary">STOCK</th>
                        <th class="theme-primary">ESTADO</th>
                        <th class="theme-primary">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productos as $producto)
                        <tr>
                            <th class="theme-primary">{{ $producto->id }}</th>
                            <td>{{ $producto->categoria_id }}</td>
                            <td>{{ $producto->codigo }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->precio }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>{{ $producto->estado }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones">
                                    <button type="button" class="btn-solid theme-primary rounded-pill m-1"
                                        onclick="document.getElementById('editarproductodialog{{ $producto->id }}').showModal()">
                                        Editar
                                    </button>

                                    {{-- MODAL DIALOGO DE EDITAR UPDATE --}}
                                    <dialog class="dialog dialog-scrollable"
                                        id="editarproductodialog{{ $producto->id }}">
                                        <form action="{{ route('producto.update', $producto->id) }}" method="POST"
                                            class="d-flex flex-column overflow-hidden h-100 m-0">
                                            @csrf
                                            @method('PUT')
                                            <div class="dialog-header flex-shrink-0">
                                                <h1 class="dialog-title">Editar Producto</h1>
                                                <button type="button" class="btn-close" onclick="document.getElementById('editarproductodialog{{ $producto->id }}').close()"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">

                                                <div class="mb-3">
                                                    <label class="form-label">Categoría ID</label>
                                                    <input type="number" class="form-control" name="categoria_id"
                                                        value="{{ old('categoria_id', $producto->categoria_id) }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Código</label>
                                                    <input type="text" class="form-control" name="codigo"
                                                        value="{{ old('codigo', $producto->codigo) }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" name="nombre"
                                                        value="{{ old('nombre', $producto->nombre) }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Descripción</label>
                                                    <textarea class="form-control" name="descripcion">{{ old('descripcion', $producto->descripcion) }}</textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Precio</label>
                                                    <input type="number" step="0.01" class="form-control" name="precio"
                                                        value="{{ old('precio', $producto->precio) }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Stock</label>
                                                    <input type="number" class="form-control" name="stock"
                                                        value="{{ old('stock', $producto->stock) }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Estado</label>
                                                    <select class="form-control" name="estado">
                                                        <option value="activo" {{ old('estado', $producto->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                                                        <option value="inactivo" {{ old('estado', $producto->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="dialog-footer">
                                                <button type="button" class="btn-solid theme-secondary"
                                                    onclick="document.getElementById('editarproductodialog{{ $producto->id }}').close()">Cerrar</button>
                                                <button type="submit" class="btn-solid theme-primary">Guardar Cambios</button>
                                            </div>
                                        </form>
                                    </dialog>

                                    {{-- BOTON ELIMINAR CON FORM --}}
                                    <form action="{{ route('producto.destroy', $producto->id) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="theme-danger btn-solid rounded-pill m-1">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center"><p class="m-3">No hay productos registrados.</p></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>