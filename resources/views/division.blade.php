@extends('adminlte::page')

@section('title', 'División')

@section('content_header')
    <h1>DIVISION </h1>
@stop

@section('content')
<form action="{{route('division.guardar')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$division->id}}">
    <div class="mb-3">
    <label for="" class="form-label">Código</label>
    <input type="text" title="No se aceptan caracteres especiales '$%&#'" class="form-control boxes" value="{{$division->codigo}}" pattern="[A-Za-z0-9]+" required maxlength="10" name="txtCodigo" id="">
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input type="text" class="form-control boxes" title="No se aceptan caracteres especiales '$%&#'"  name="txtNombre" pattern="[A-Za-z0-9]+" required value="{{$division->nombre}}" id="">
    </div>
    <center><button type="submit" class="btn btn-lg btn-primary mb-5">Crear</button></center>
</form>
@stop
