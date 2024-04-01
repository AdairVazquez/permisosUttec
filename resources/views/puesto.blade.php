@extends('adminlte::page')

@section('title', 'Puesto')

@section('content_header')
    <h1>PUESTO </h1>
@stop

@section('content')
<form action="{{route('puesto.guardar')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$puesto->id}}">
    <div class="mb-3">
    <label for="" class="form-label">Código</label>
    <input type="text" class="form-control boxes" value="{{$puesto->codigo}}" name="txtCodigo" id="" maxlength="5" title="No se aceptan caracteres especiales '$%&#'" pattern="[A-Za-z0-9]+" required>
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input type="text" class="form-control boxes" name="txtNombre" value="{{$puesto->nombre}}" id="" maxlength="255" title="No se aceptan caracteres especiales '$%&#'" pattern="[A-Za-z0-9]+" required>
    </div>
    <center><button type="submit" class="btn btn-lg btn-primary mb-5">Crear</button></center>
</form>
@stop