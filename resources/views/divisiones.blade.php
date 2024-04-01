@extends('adminlte::page')

@section('title', 'Divisiones')

@section('content_header')
    <h1>DIVISIONES</h1>
@stop

@section('content')
    <table id="table-data" class="table">
        <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th colspan="2" scope="col">Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($divisiones as $division)
            <tr>
                <td>{{$division['codigo']}}</td>
                <td>{{$division['nombre']}}</td>
                <td>
                    <a href="{{route('division.nueva',['id' => $division['id']])}}" class="btn btn-success btn-sm rounded-0">
                        <span class="far fa-edit">EDITAR :D</span>
                    </a>
                </td>
                <td>
                    <form action="{{route('division.eliminar',['id' => $division['id']])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$division['id']}}">
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