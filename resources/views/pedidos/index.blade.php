<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pedidos</title>

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
                            <a class="nav-link" href="{{ route('producto.index') }}">Productos</a>
                            <a class="nav-link active" aria-current="page" href="{{ route('pedido.index') }}">Pedidos</a>
                        </div>
                    </div>
                </dialog>
            </div>
        </nav>
    </div>

{{-- BOTON DE AÑADIR Y SU DIALOGO PARA GUARDAR, STORE --}}
    <div class="container-fluid m-3">
        <div class="d-flex justify-content-end m-5">

            <button type="button" class="btn-solid theme-primary rounded-pill" onclick="document.getElementById('aniadirpedidoDialog').showModal()">
                Añadir Pedido
            </button>

            <dialog class="dialog dialog-scrollable" id="aniadirpedidoDialog">
                <form action="{{ route('pedido.store') }}" method="POST"
                    class="d-flex flex-column overflow-hidden h-100 m-0">
                    @csrf
                    <div class="dialog-header flex-shrink-0">
                        <h1 class="dialog-title">Añadir Pedido</h1>
                        <button type="button" class="btn-close" onclick="document.getElementById('aniadirpedidoDialog').close()" aria-label="Close"></button>
                    </div>
                    <div class="dialog-body">

                        <div class="mb-3">
                            <label for="cliente_id_add" class="form-label">Cliente ID</label>
                            <input type="number" class="form-control" name="cliente_id" value="{{ old('cliente_id') }}"
                                id="cliente_id_add" placeholder="1">
                        </div>

                        <div class="mb-3">
                            <label for="empleado_id_add" class="form-label">Empleado ID</label>
                            <input type="number" class="form-control" name="empleado_id" value="{{ old('empleado_id') }}"
                                id="empleado_id_add" placeholder="1">
                        </div>

                        <div class="mb-3">
                            <label for="numero_pedido_add" class="form-label">Número de Pedido</label>
                            <input type="text" class="form-control" name="numero_pedido" value="{{ old('numero_pedido') }}"
                                id="numero_pedido_add" placeholder="P-1234">
                        </div>

                        <div class="mb-3">
                            <label for="fecha_pedido_add" class="form-label">Fecha de Pedido</label>
                            <input type="date" class="form-control" name="fecha_pedido" value="{{ old('fecha_pedido') }}"
                                id="fecha_pedido_add">
                        </div>

                        <div class="mb-3">
                            <label for="fecha_entrega_add" class="form-label">Fecha de Entrega</label>
                            <input type="date" class="form-control" name="fecha_entrega" value="{{ old('fecha_entrega') }}"
                                id="fecha_entrega_add">
                        </div>

                        <div class="mb-3">
                            <label for="total_add" class="form-label">Total</label>
                            <input type="number" step="0.01" class="form-control" name="total" value="{{ old('total', 0) }}"
                                id="total_add" placeholder="0.00">
                        </div>

                        <div class="mb-3">
                            <label for="estado_add" class="form-label">Estado</label>
                            <select class="form-control" name="estado" id="estado_add">
                                <option value="pendiente" {{ old('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="procesando" {{ old('estado') == 'procesando' ? 'selected' : '' }}>Procesando</option>
                                <option value="enviado" {{ old('estado') == 'enviado' ? 'selected' : '' }}>Enviado</option>
                                <option value="entregado" {{ old('estado') == 'entregado' ? 'selected' : '' }}>Entregado</option>
                                <option value="cancelado" {{ old('estado') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="observaciones_add" class="form-label">Observaciones</label>
                            <textarea class="form-control" name="observaciones" id="observaciones_add">{{ old('observaciones') }}</textarea>
                        </div>

                    </div>
                    <div class="dialog-footer">
                        <button type="button" class="btn-solid theme-secondary"
                            onclick="document.getElementById('aniadirpedidoDialog').close()">Cerrar</button>
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
                <a href="{{ route('pedido.index') }}" class="btn-solid theme-warning">Entendido</a>
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
                        <th class="theme-primary">CLIENTE ID</th>
                        <th class="theme-primary">EMPLEADO ID</th>
                        <th class="theme-primary">NUMERO DE PEDIDO</th>
                        <th class="theme-primary">FECHA DE PEDIDO</th>
                        <th class="theme-primary">FECHA DE ENTREGA</th>
                        <th class="theme-primary">TOTAL</th>
                        <th class="theme-primary">ESTADO</th>
                        <th class="theme-primary">OBSERVACIONES</th>
                        <th class="theme-primary">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pedidos as $pedido)
                        <tr>
                            <th class="theme-primary">{{ $pedido->id }}</th>
                            <td>{{ $pedido->cliente_id }}</td>
                            <td>{{ $pedido->empleado_id }}</td>
                            <td>{{ $pedido->numero_pedido }}</td>
                            <td>{{ $pedido->fecha_pedido }}</td>
                            <td>{{ $pedido->fecha_entrega }}</td>
                            <td>{{ $pedido->total }}</td>
                            <td>{{ $pedido->estado }}</td>
                            <td>{{ $pedido->observaciones }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones">
                                    <button type="button" class="btn-solid theme-primary rounded-pill m-1"
                                        onclick="document.getElementById('editarpedidodialog{{ $pedido->id }}').showModal()">
                                        Editar
                                    </button>

                                    {{-- MODAL DIALOGO DE EDITAR UPDATE --}}
                                    <dialog class="dialog dialog-scrollable"
                                        id="editarpedidodialog{{ $pedido->id }}">
                                        <form action="{{ route('pedido.update', $pedido->id) }}" method="POST"
                                            class="d-flex flex-column overflow-hidden h-100 m-0">
                                            @csrf
                                            @method('PUT')
                                            <div class="dialog-header flex-shrink-0">
                                                <h1 class="dialog-title">Editar Pedido</h1>
                                                <button type="button" class="btn-close" onclick="document.getElementById('editarpedidodialog{{ $pedido->id }}').close()"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">

                                                <div class="mb-3">
                                                    <label class="form-label">Cliente ID</label>
                                                    <input type="number" class="form-control" name="cliente_id"
                                                        value="{{ old('cliente_id', $pedido->cliente_id) }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Empleado ID</label>
                                                    <input type="number" class="form-control" name="empleado_id"
                                                        value="{{ old('empleado_id', $pedido->empleado_id) }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Número de Pedido</label>
                                                    <input type="text" class="form-control" name="numero_pedido"
                                                        value="{{ old('numero_pedido', $pedido->numero_pedido) }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Fecha de Pedido</label>
                                                    <input type="date" class="form-control" name="fecha_pedido"
                                                        value="{{ old('fecha_pedido', $pedido->fecha_pedido) }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Fecha de Entrega</label>
                                                    <input type="date" class="form-control" name="fecha_entrega"
                                                        value="{{ old('fecha_entrega', $pedido->fecha_entrega) }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Total</label>
                                                    <input type="number" step="0.01" class="form-control" name="total"
                                                        value="{{ old('total', $pedido->total) }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Estado</label>
                                                    <select class="form-control" name="estado">
                                                        <option value="pendiente" {{ old('estado', $pedido->estado) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                                        <option value="procesando" {{ old('estado', $pedido->estado) == 'procesando' ? 'selected' : '' }}>Procesando</option>
                                                        <option value="enviado" {{ old('estado', $pedido->estado) == 'enviado' ? 'selected' : '' }}>Enviado</option>
                                                        <option value="entregado" {{ old('estado', $pedido->estado) == 'entregado' ? 'selected' : '' }}>Entregado</option>
                                                        <option value="cancelado" {{ old('estado', $pedido->estado) == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Observaciones</label>
                                                    <textarea class="form-control" name="observaciones">{{ old('observaciones', $pedido->observaciones) }}</textarea>
                                                </div>

                                            </div>
                                            <div class="dialog-footer">
                                                <button type="button" class="btn-solid theme-secondary"
                                                    onclick="document.getElementById('editarpedidodialog{{ $pedido->id }}').close()">Cerrar</button>
                                                <button type="submit" class="btn-solid theme-primary">Guardar Cambios</button>
                                            </div>
                                        </form>
                                    </dialog>

                                    {{-- BOTON ELIMINAR CON FORM --}}
                                    <form action="{{ route('pedido.destroy', $pedido->id) }}" method="POST" class="m-0">
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
                            <td colspan="10" class="text-center"><p class="m-3">No hay pedidos registrados.</p></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>