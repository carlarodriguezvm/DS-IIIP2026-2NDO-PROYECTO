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
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('cliente.index') }}">Clientes</a>
                            <a class="nav-link" href="{{ route('empleado.index') }}">Empleados</a>
                            <a class="nav-link" href="{{ route('bodega.index') }}">Bodegas</a>
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
                data-bs-target="#aniadirclienteDialog">
                Añadir Cliente
            </button>

            <dialog class="dialog dialog-scrollable" id="aniadirclienteDialog">
                <form action="{{ route('cliente.store') }}" method="POST"
                    class="d-flex flex-column overflow-hidden h-100 m-0">
                    @csrf
                    <div class="dialog-header" flex-shrink-0>
                        <h1 class="dialog-title">Añadir Cliente</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                    </div>
                    <div class="dialog-body">

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Codigo</label>
                            <input type="text" class="form-control" name="codigo" value="{{ old('codigo') }}"
                                id="formGroupExampleInput" placeholder="C-1234">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre"
                                id="nombre" placeholder="John">

                            @error('nombre')
                                <div class="invalid-feedback">
                                    <p> {{ $message }}
                                    <p>
                                </div>
                            @enderror

                        </div>
                        <div class="form-field">
                            <label for="fieldText" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email"
                                id="email" placeholder="name@example.com">
                            <div class="form-text">
                                Es un correo unico por cliente.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Telefono</label>
                            <input type="text" class="form-control" name="telefono"
                                id="Telefono" placeholder="+1-234-567-8910">
                        </div>
                        <div class="form-field">
                            <label for="exampleFormControlTextarea1" class="form-label">Direccion</label>
                            <textarea class="form-control" name="direccion" id="exampleFormControlTextarea1">{{ old('direccion') }}</textarea>

                        </div>

                        <div class="form-text">

                            <label for="exampleFormControlTextarea1" class="form-label">Estado</label>
                            <button class="form-control combobox-toggle" type="button" data-bs-toggle="combobox"
                                data-bs-name="estado" data-bs-placeholder="Choose a role…">
                                <span class="combobox-value">Choose a role…</span>
                                <svg class="combobox-caret" width="10" height="16" viewBox="0 0 10 16"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.46967 5.46967C0.762563 5.17678 1.23744 5.17678 1.53033 5.46967L5 8.93934L8.46967 5.46967C8.76256 5.17678 9.23744 5.17678 9.53033 5.46967C9.82322 5.76256 9.82322 6.23744 9.53033 6.53033L5.53033 10.5303C5.23744 10.8232 4.76256 10.8232 4.46967 10.5303L0.46967 6.53033C0.176777 6.23744 0.176777 5.76256 0.46967 5.46967Z"
                                        fill="currentcolor" />
                                </svg>
                            </button>
                            <div class="menu">
                                <button class="menu-item selected" type="button" data-bs-value="activo"
                                    aria-selected="true">Activo</button>
                                <button class="menu-item" type="button" data-bs-value="inactivo">Inactivo</button>
                            </div>
                        </div>

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

{{-- MENSAJE DE EXITO PARA AñADIR--}}
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
                <a href="{{ route('cliente.index') }}" class="btn-solid theme-warning">Entendido</a>
            </div>
        </div>
    @endif


{{-- TABLAAA --}}
        <div class="container-fluid">
            <div class="border rounded overflow-hidden">
                <table class="table theme-inverse"">
                    <thead>
                        <tr>
                            <th class="theme-primary">#</th>
                            <th class="theme-primary">NOMBRE</th>
                            <th class="theme-primary">CODIGO</th>
                            <th class="theme-primary">EMAIL</th>
                            <th class="theme-primary">TELEFONO</th>
                            <th class="theme-primary">DIRECCION</th>
                            <th class="theme-primary">ESTADO</th>
                            <th class="theme-primary">ACCIONES</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @forelse ($clientes as $cliente)
                                <th class=theme-primary>{{ $cliente->id }}</th>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->codigo }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>{{ $cliente->telefono }}</td>
                                <td>{{ $cliente->direccion }}</td>
                                <td>{{ $cliente->estado }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn-solid theme-primary rounded-pill m-1"
                                            data-bs-toggle="dialog"
                                            data-bs-target="#editarclientedialog{{ $cliente->id }}">
                                            Editar
                                        </button>

                                        {{-- MODAL DIALOGO DE EDITAR ACTUALIZAAR UPDATE --}}
                                        <dialog class="dialog dialog-scrollable"
                                            id="editarclientedialog{{ $cliente->id }}">
                                            <form action="{{ route('cliente.update', $cliente->id) }}" method="POST"
                                                class="d-flex flex-column overflow-hidden h-100 m-0">
                                                @csrf
                                                @method('PUT')
                                                <div class="dialog-header" flex-shrink-0>
                                                    <h1 class="dialog-title">Añadir Cliente</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="dialog"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="dialog-body">

                                                    <div class="mb-3">
                                                        <label for="formGroupExampleInput"
                                                            class="form-label">Codigo</label>
                                                        <input type="text" class="form-control" name="codigo"
                                                            value="{{ old('codigo', $cliente->codigo) }}"
                                                            id="formGroupExampleInput" placeholder="C-1234">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formGroupExampleInput2"
                                                            class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre"
                                                            value="{{ old('nombre', $cliente->nombre) }}"
                                                            id="formGroupExampleInput2" placeholder="John">

                                                        @error('nombre')
                                                            <div class="invalid-feedback">
                                                                <p> {{ $message }}
                                                                <p>
                                                            </div>
                                                        @enderror

                                                    </div>
                                                    <div class="form-field">
                                                        <label for="fieldText" class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="email"
                                                            value="{{ old('email', $cliente->email) }}"
                                                            id="fieldText" placeholder="name@example.com">
                                                        <div class="form-text">
                                                            Es un correo unico por cliente.
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formGroupExampleInput2"
                                                            class="form-label">Telefono</label>
                                                        <input type="text" class="form-control" name="telefono"
                                                            value="{{ old('telefono', $cliente->telefono) }}"
                                                            id="formGroupExampleInput2" placeholder="+1-234-567-8910">
                                                    </div>
                                                    <div class="form-field">
                                                        <label for="exampleFormControlTextarea1"
                                                            class="form-label">Direccion</label>
                                                        <textarea class="form-control" name="direccion" id="exampleFormControlTextarea1">{{ old('direccion', $cliente->direccion) }}</textarea>

                                                    </div>

                                                    <div class="form-text">

                                                        <label for="exampleFormControlTextarea1"
                                                            class="form-label">Estado</label>
                                                        <button class="form-control combobox-toggle" type="button"
                                                            data-bs-toggle="combobox" data-bs-name="estado"
                                                            data-bs-placeholder="Choose a role…">
                                                            <span class="combobox-value">Choose a role…</span>
                                                            <svg class="combobox-caret" width="10" height="16"
                                                                viewBox="0 0 10 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M0.46967 5.46967C0.762563 5.17678 1.23744 5.17678 1.53033 5.46967L5 8.93934L8.46967 5.46967C8.76256 5.17678 9.23744 5.17678 9.53033 5.46967C9.82322 5.76256 9.82322 6.23744 9.53033 6.53033L5.53033 10.5303C5.23744 10.8232 4.76256 10.8232 4.46967 10.5303L0.46967 6.53033C0.176777 6.23744 0.176777 5.76256 0.46967 5.46967Z"
                                                                    fill="currentcolor" />
                                                            </svg>
                                                        </button>
                                                        <div class="menu">
                                                            <button class="menu-item selected" type="button"
                                                                data-bs-value="activo"
                                                                aria-selected="true">Activo</button>
                                                            <button class="menu-item" type="button"
                                                                data-bs-value="inactivo">Inactivo</button>
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
                                    <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="theme-danger btn-solid rounded-pill m-1">Eliminar</button>
                                    </form>
            </div>
            </td>
            </tr>
        @empty
            <p>No hay clientes registrados.</p>
    @endforelse

    </tbody>
    </table>
    </div>

</body>

</html>
