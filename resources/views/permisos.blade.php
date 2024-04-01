@extends('adminlte::page')

@section('title', 'Divisiones')

@section('content_header')
    <h1>Profesores</h1>
@stop



@section('content')
    <table id="table-data" class="table">
        <thead>
        <tr>
            <th scope="col">Profesor</th>
            <th scope="col">Fecha</th>
            <th scope="col">Motivo</th>
            <th scope="col">Estado</th>
            <th colspan="2" scope="col">Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($permiso as $profesor)
        
            <tr>
                <td>{{$profesor['nombre']}}</td>
                <td>{{$profesor['fecha']}}</td>
                <td>{{$profesor['motivo']}}</td>
                <?php $estado = $profesor['estado'] ?>
                @if($estado=='P')
                    <td style="color: blue">{{$profesor['estado']}}</td>
                @elseif($estado=='R')
                    <td style="color: red">{{$profesor['estado']}}</td>
                @elseif($estado=='A')
                <td style="color: green">{{$profesor['estado']}}</td>
                @endif
                <td>
                    <form action="{{route('permiso.autorizar',['id' => $profesor['id'], 'fecha' => $profesor['fecha'],'motivo' => $profesor['motivo'],'nombre_profesor'=> $profesor['nombre_profesor']])}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$profesor['id']}}">
                    <input type="submit" class="btn btn-success btn-sm rounded-0" value="Autorizar :D">
                    
                    </form>
                </td>
                <td>
                    <a href="{{route('reg.permiso',['id' => $profesor['id']])}}"  class="btn btn-danger btn-sm rounded-0" >
                        <span class="far fa-edit">Rechazar D:</span>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody> 
    </table>
@stop
@section('js')
    <script>
        $('#table-data').DataTable({
            "scrollX": true
        })
    </script>
@stop
