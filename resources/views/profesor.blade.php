@extends('adminlte::page')

@section('title', 'División')

@section('content_header')
    <h1>PROFESOR NUEVO </h1>
@stop

@section('content')
<form action="@if(empty($profesor->id)){{route('profesor.guardar')}}@else{{route('profesor.actualizar')}}@endif" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$profesor->id}}">
    <div class="mb-3">
    <label for="" class="form-label">Numero de teléfono</label>
    <input type="text" class="form-control boxes" value="{{$profesor->numero}}" name="txtNumero" id="" maxlength="10" pattern="[0-9]+" title="Por favor, solo ingresa números" required>
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input type="text" class="form-control boxes" value="{{$profesor->nombre}}" name="txtNombre" id="" required maxlength="100">
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Horas asignadas</label>
    <input type="number" class="form-control boxes" value="{{$profesor->horas_asignadas}}" required name="txtHrs" maxlength="2" id="">
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Dias economicos correspondientes</label>
    <input type="number" class="form-control boxes" name="txtDias" value="{{$profesor->dia_econom_c}}" maxlength="2" required id="">
    </div>
    <div class="mb-3">
        <label class="form-label"  for="" >Usuario</label><br>
        <select class="form-select mt-2" required name="usuario" id="">
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Puesto</label><br>
        <select name="puesto" id="" required class="form-select">
            @foreach($puestos as $puesto)
                <option value="{{$puesto->id}}">{{$puesto->nombre}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Division</label><br>
        <select name="division" id="" required class="form-select">
            @foreach($divisiones as $division)
            <option value="{{$division->id}}">{{$division->nombre}}</option>
            @endforeach
                
        </select>
    </div>

    <center><button type="submit" class="btn btn-lg btn-primary mb-5">Crear</button></center>
</form>
@stop