@extends('adminlte::page')

@section('title', 'División')

@section('content_header')
    <h1>RECHAZAR PERMISO</h1>
@stop

@section('content')
<form action="{{route('rechazar.permiso')}}" method="post">
    @csrf
    @foreach ($permisos as $permiso)
    <input type="hidden" name="id" value="{{$permiso->id}}">
    <div class="mb-3">
    <label for="" class="form-label">Fecha</label>
    <input type="text" disabled class="form-control boxes" value="{{$permiso->fecha}}" name="" id="">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Division Profesor</label>
        <input type="text"  disabled class="form-control boxes" value="{{$permiso->division}}" name="" id="">
        </div>
    <div class="mb-3">
    <label for="" class="form-label">Nombre Profesor</label>
    <input type="text"  disabled class="form-control boxes" value="{{$permiso->nombre}}" name="" id="">
    </div>

    <div class="mb-3">
    <label for="" class="form-label">Motivo del profesor</label>
    <input type="text"  disabled class="form-control boxes" value="{{$permiso->motivo}}" name="" id="">
    </div>

    <label for="" class="form-label">Observacion</label>
    <textarea type="textarea" row="3"  class="form-control boxes" value="" name="observacion" id=""></textarea>
    </div>
@endforeach
    <center><button type="submit" class="btn btn-lg btn-danger mt-5">Actualizar estado</button></center>
</form>
@stop
