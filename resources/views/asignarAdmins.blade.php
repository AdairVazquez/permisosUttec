@extends('adminlte::page')

@section('title', 'Asignar Rol')

@section('content_header')
    <h1>Asignar rol</h1>
@stop

@section('content')
    <table id="table-data" class="table">
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Rol</th>
            <th scope="col">Asignar rol Administrador</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($usuarios as $users)
            <tr>
                <td>{{$users['name']}}</td>
                <td>{{$users['email']}}</td>
                <td>{{$users['rol']}}</td>
                <td>
                    <a href="{{route('admin.nueva',['id' => $users['id']])}}" class="btn btn-success btn-sm rounded-0">
                        <span class="btn btn-success rounded-0">Asignar rol</span>
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