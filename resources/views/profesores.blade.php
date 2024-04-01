@extends('adminlte::page')

@section('title', 'Divisiones')

@section('content_header')
    <h1>Profesores</h1>
@stop

@section('content')
    <table id="table-data" class="table">
        <thead>
        <tr>
            <th scope="col">Numero</th>
            <th scope="col">Nombre</th>
            <th scope="col">Horas asignadas</th>
            <th scope="col">Dia eco. a.</th>
            <th scope="col">Usuario</th>
            <th scope="col">Puesto</th>
            <th scope="col">Division</th>
            <th colspan="2" scope="col">Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($profesores as $profesor)
            <tr>
                <td>{{$profesor['numero']}}</td>
                <td>{{$profesor['nombre']}}</td>
                <td>{{$profesor['horas_asignadas']}}</td>
                <td>{{$profesor['dias_economicos']}}</td>
                <td>{{$profesor['usuario_id']}}</td>
                <td>{{$profesor->nombre_puesto}}</td>
                <td>{{$profesor->division->nombre}}</td>
                

                <td>
                    <a href="{{route('profesor.nueva',['id' => $profesor['id']])}}" class="btn btn-success btn-sm rounded-0">
                        <span class="far fa-edit">EDITAR :D</span>
                    </a>
                </td>
                <td>
                    <form action="{{route('profesor.eliminar',['id' => $profesor['id']])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$profesor['id']}}">
                    <input type="submit" class="btn btn-danger btn-sm rounded-0" value="ELIMINAR D:">
                    
                    </form>
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