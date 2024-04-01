@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>BIENVENID@ <b> {{$user->name}} </b> {{$user->age}}</h1>
@stop

@section('content')
       <div class="row" style="align-items: center">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('img/graduacion.jpg') }}" class="card-img-top" height="250px" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Divisiones</h5>
                  <p class="card-text">Gestion de las divisiones.</p>
                  <a href="{{route('division.nueva')}}" class="btn btn-primary">Nueva division.</a>                  
                  <a href="{{route('divisiones')}}" class="btn btn-success">Listado de divisiones.</a>
                </div>
              </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('img/puestos.jpg') }}" class="card-img-top" height="250px" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Puestos</h5>
                  <p class="card-text">Gestión de los profesores.</p>
                  <a href="{{route('puesto.nueva')}}" class="btn btn-primary">Nuevo puesto</a>
                  <a href="{{route('puestos')}}" class="btn btn-success">Listado puestos</a>
                </div>
              </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('img/profesores.jpg') }}" class="card-img-top" height="250px" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Profesores</h5>
                  <p class="card-text">Gestión de los profesores.</p>
                  <a href="{{route('profesor.nueva')}}" class="btn btn-primary">Nuevo profesor</a>
                  <a href="{{route('profesores')}}" class="btn btn-success">Listado profesores</a>
                </div>
              </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('img/permisos.jpg') }}" class="card-img-top" height="250px" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Permisos</h5>
                  <p class="card-text">Gestión de los permisos.</p>
                  <a href="{{route('permisos')}}" class="btn btn-primary">Listado de los permisos</a>
                </div>
              </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('img/logs.jpg') }}" class="card-img-top" height="250px" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Logs</h5>
                  <p class="card-text">Regsitros dentro de la aplicación web.</p>
                  <a href="{{route('errores')}}" class="btn btn-primary">Listados</a>
                </div>
              </div>
        </div>
       </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop