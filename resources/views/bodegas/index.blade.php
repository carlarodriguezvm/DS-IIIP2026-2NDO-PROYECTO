<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
                            <a class="nav-link active" aria-current="page"  href="{{ route('bodega.index') }}">Bodegas</a>
                            <a class="nav-link" href="{{ route('categoria.index') }}">Categorias</a>
                            <a class="nav-link" href="{{ route('producto.index') }}">Productos</a>
                            <a class="nav-link" href="{{ route('pedido.index') }}">Pedidos</a>


                        </div>
                    </div>
                </dialog>
            </div>
        </nav>
    </div>

{{-- BOTON DE AñADIR Y SU DIALOGO PARA GUARDAR, STORE --}}
    <div class="container-fluid m-3">
        <div class="d-flex justify-content-end m-5">

            <button type="button" class="btn-solid theme-primary rounded-pill" data-bs-toggle="dialog"
                data-bs-target="#aniadirbodegaDialog">
                Añadir Bodega
            </button>

            <dialog class="dialog dialog-scrollable" id="aniadirbodegaDialog">
                <form action="{{ route('bodega.store') }}" method="POST"
                    class="d-flex flex-column overflow-hidden h-100 m-0">
                    @csrf
                    <div class="dialog-header" flex-shrink-0>
                        <h1 class="dialog-title">Añadir Bodega</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                    </div>
                    <div class="dialog-body">


                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Codigo</label>
                            <input type="text" class="form-control" name="codigo" value="{{ old('codigo') }}"
                                id="formGroupExampleInput" placeholder="B-1234">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}"
                                id="formGroupExampleInput2" placeholder="La Esperanza">

                            @error('nombre')
                                <div class="invalid-feedback">
                                    <p> {{ $message }}
                                    <p>
                                </div>
                            @enderror

                        <div class="form-field">
                            <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                            <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1">{{ old('descripcion') }}</textarea>

                        <div class="dialog-footer">
                            <button type="button" class="btn-solid theme-secondary"
                                data-bs-dismiss="dialog">Cerrar</button>
                            <button type="submit" class="btn-solid theme-primary">Guardar Cambios</button>
                        </div>
                </form>
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

{{-- MENSAJE DE ERROR PARA AñADIR --}}
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
                <a href="{{ route('bodega.index') }}" class="btn-solid theme-warning">Entendido</a>
            </div>
        </div>
    @endif


{{-- TABLAAA --}}
        <div class="container-fluid">
            <div class="border rounded overflow-hidden">
                <table class="table theme-inverse">
                    <thead>
                        <tr>
                            <th class="theme-primary">#</th>
                            <th class="theme-primary">NOMBRE</th>
                            <th class="theme-primary">CODIGO</th>
                            <th class="theme-primary">DESCRIPCION</th>
                            <th class="theme-primary">ACCIONES</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @forelse ($bodegas as $bodega)
                                <th class=theme-primary>{{ $bodega->id }}</th>
                                <td>{{ $bodega->nombre }}</td>
                                <td>{{ $bodega->codigo }}</td>
                                <td>{{ $bodega->descripcion }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn-solid theme-primary rounded-pill m-1"
                                            data-bs-toggle="dialog"
                                            data-bs-target="#editarbodegadialog{{ $bodega->id }}">
                                            Editar
                                        </button>

                                        {{-- MODAL DIALOGO DE EDITAR ACTUALIZAAR UPDATE --}}
                                        <dialog class="dialog dialog-scrollable"
                                            id="editarbodegadialog{{ $bodega->id }}">
                                            <form action="{{ route('bodega.update', $bodega->id) }}" method="POST"
                                                class="d-flex flex-column overflow-hidden h-100 m-0">
                                                @csrf
                                                @method('PUT')
                                                <div class="dialog-header" flex-shrink-0>
                                                    <h1 class="dialog-title">Añadir Bodega</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="dialog"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="dialog-body">

                                                    <div class="mb-3">
                                                        <label for="formGroupExampleInput"
                                                            class="form-label">Codigo</label>
                                                        <input type="text" class="form-control" name="codigo"
                                                            value="{{ old('codigo', $bodega->codigo) }}"
                                                            id="formGroupExampleInput" placeholder="C-1234">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formGroupExampleInput2"
                                                            class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre"
                                                            value="{{ old('nombre', $bodega->nombre) }}"
                                                            id="formGroupExampleInput2" placeholder="John">

                                                        @error('nombre')
                                                            <div class="invalid-feedback">
                                                                <p> {{ $message }}
                                                                <p>
                                                            </div>
                                                        @enderror

                                                    <div class="form-field">
                                                        <label for="exampleFormControlTextarea1"
                                                            class="form-label">Descripcion</label>
                                                        <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1">{{ old('descripcion', $bodega->descripcion) }}</textarea>

                                                    </div>
                                                    </div>

                                                    <div class="dialog-footer">
                                                        <button type="button" class="btn-solid theme-secondary"
                                                            data-bs-dismiss="dialog">Cerrar</button>
                                                        <button type="submit" class="btn-solid theme-primary">Guardar
                                                            Cambios</button>
                                                    </div>
                                            </form>
                                    </div>
                                    </form>
                                    </dialog>
                                    {{-- BOTON ELIMINAR CON FORM --}}
                                    <form action="{{ route('bodega.destroy', $bodega->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="theme-danger btn-solid rounded-pill m-1">Eliminar</button>
                                    </form>
            </div>
            </td>
            </tr>
        @empty
            <p>No hay bodegas registradas.</p>
    @endforelse

    </tbody>
    </table>
    </div>

</body>

</html>
