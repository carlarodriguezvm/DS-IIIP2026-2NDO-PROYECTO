<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proovedores</title>

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
                            <a class="nav-link" href="{{ route('pedido.index') }}">Pedidos</a>
                            <a class="nav-link active" aria-current="page" href="{{ route('proovedor.index') }}">Proovedor</a>
                        </div>
                    </div>
                </dialog>
            </div>
        </nav>
    </div>



{{-- TABLAAAA --}}

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">CODIGO</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">EMAIL</th>
    <th scope="col">TELEFONO</th>
    <th scope="col">FECHA ENROLAMIENTO</th>
    <th scope="col">ESTADO</th>
    <th scope="col">ACCIONES</th>

    </tr>
  </thead>
  <tbody>
  @forelse ($proovedores as $proovedor)

    <tr>
      <th scope="row">{{$proovedor->id}}</th>
      <td>{{$proovedor->codigo}}</td>
      <td>{{$proovedor->nombre}}</td>
      <td>@{{$proovedor->email}}</td>
      <td>{{$proovedor->telefono}}</td>
      <td>{{$proovedor->fecha_enrrolamiento}}</td>
      <td>@{{$proovedor->estado}}</td>
    </tr>

    @empty 
    <p> <p>
  </tbody>
</table>


</body>
</html>