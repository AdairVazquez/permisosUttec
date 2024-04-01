@extends('layout')
@section('title','Login')
@section('content')
        <main class="container contenedor">
            <h1 class="mt-3"> INICIO DE SESION </h1>
            <form action="{{route('login.validate')}}" method="post">
                @csrf
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Usuario</label>
                <input type="text" class="form-control boxes" name="txtUsuario" id="txtUsuario" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control boxes" name="txtContraseña" id="txtContraseña">
                </div>
                <center><button type="submit" class="btn btn-lg btn-primary mb-5">Ingresar</button></center>
            </form>
        </main> 
@endsection
    


