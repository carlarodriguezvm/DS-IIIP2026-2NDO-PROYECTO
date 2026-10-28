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
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
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


<div class="card">
  <div class="card-body">
<button type="button" class="btn-solid theme-primary" data-bs-toggle="dialog" data-bs-target="#scrollableBodyDialog">
  Añadir Cliente
</button>


<dialog class="dialog dialog-scrollable" id="scrollableBodyDialog">
  <div class="dialog-header">
    <h1 class="dialog-title">Añadir Cliente</h1>
    <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
  </div>
  <div class="dialog-body">
    <p>

      <form>
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Codigo</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="C-1234">
        </div>
        <div class="mb-3">
          <label for="formGroupExampleInput2" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="John">
        </div>
        <div class="form-field">
          <label for="fieldText" class="form-label">Email</label>
          <input type="email" class="form-control" id="fieldText" placeholder="name@example.com">
          <div class="form-text">
            Es un correo unico por cliente.
          </div>
        </div>
        <div class="mb-3">
          <label for="formGroupExampleInput2" class="form-label">Telefono</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="+1-234-567-8910">
        </div>
        <div class="form-field">
          <label for="exampleFormControlTextarea1" class="form-label">Dirreccion</label>
          <textarea class="form-control" id="exampleFormControlTextarea1"></textarea>
        </div>
        <!-- ESTADO -->
        <div class="form-field">
          <label>Estado</label>
          <button class="form-control combobox-toggle" type="button"
              data-bs-toggle="combobox"
              data-bs-name="option"
              data-bs-placeholder="Select an item…">
            <svg class="combobox-caret" width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.46967 5.46967C0.762563 5.17678 1.23744 5.17678 1.53033 5.46967L5 8.93934L8.46967 5.46967C8.76256 5.17678 9.23744 5.17678 9.53033 5.46967C9.82322 5.76256 9.82322 6.23744 9.53033 6.53033L5.53033 10.5303C5.23744 10.8232 4.76256 10.8232 4.46967 10.5303L0.46967 6.53033C0.176777 6.23744 0.176777 5.76256 0.46967 5.46967Z" fill="currentcolor"/></svg>
          </button>
          <div class="menu">
            <button class="menu-item" type="button" data-bs-value="1">Activo</button>
            <button class="menu-item" type="button" data-bs-value="2">Inactivo</button>
          </div>
          <div class="form-text">Choose an item from the menu above.</div>
        </div>
      </form>

    </p>
  </div>
  <div class="dialog-footer">
    <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Cerrar</button>
    <button type="button" class="btn-solid theme-primary">Guardar Cambios</button>
  </div>
</dialog>

  </div>
</div>

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