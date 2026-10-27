<!-- {{$clientes}} -->
<!-- @forelse ($clientes as $cliente)
    {{$cliente->nombre}}
    <p> ....</p>
    {{$cliente->email}}
@empty
    <p>No hay clientes registrados.</p>
@endforelse -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
<script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script> -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
  </head> 

  <body>
    
    
    <div class="container-navbar">
    <nav class="navbar sm:navbar-expand bg-1 fg-2">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Store</a>
      <button class="btn-icon navbar-toggler" type="button" data-bs-toggle="drawer" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" aria-hidden="true"></span>
      </button>
      <dialog class="drawer drawer-end" tabindex="-1" id="navbarNavAltMarkup" aria-labelledby="navbarNavAltMarkupLabel">
        <div class="drawer-header">
          <h5 class="drawer-title" id="navbarNavAltMarkupLabel">Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="drawer" aria-label="Close"></button>
        </div>
        <div class="drawer-body">
          <div class="nav nav-pills navbar-nav">
            <a class="nav-link active" aria-current="page" href="#">Clientes</a>
            <a class="nav-link" href="#">Empleados</a>
            <a class="nav-link" href="#">Categorias</a>
            <a class="nav-link" href="#">Productos</a>
            <a class="nav-link" href="#">Pedidos</a>
            
            
          </div>
        </div>
      </dialog>
    </div>
  </nav>
</div>

<button type="button" class="btn-solid theme-primary">Añadir</button>

<div class="container-table">
  <table class="table theme-primary">
    <thead>
      <tr >
        <th scope="col">#</th>
        <th scope="col">NOMBRE</th>
        <th scope="col">CODIGO</th>
        <th scope="col">EMAIL</th>
        <th scope="col">TELEFONO</th>
        <th scope="col">DIRECCION</th>
        <th scope="col">ESTADO</th>
        <th scope="col">Acciones</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        @forelse ($clientes as $cliente)
        <th scope="row">{{$cliente->id}}</th>
        <td class="theme-accent">{{$cliente->nombre}}</td>
        <td>{{$cliente->codigo}}</td>
        <td class="theme-accent" >{{$cliente->email}}</td>
        <td>{{$cliente->telefono}}</td>
        <td>{{$cliente->direccion}}</td>
        <td>{{$cliente->estado}}</td>
        <td><div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn-solid theme-primary">Editar</button>
          <button type="button" class="btn-solid theme-primary">Eliminar</button>
        </div></td>
      </tr>
      @empty
      <p>No hay clientes registrados.</p>
      @endforelse 
      
    </tbody>
  </table>
</div>


<script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
</body>
</html>