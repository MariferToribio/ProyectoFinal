@extends('adminlte::page')

@section('title', 'BookStore')

@section('content_header')
    <h1>ADMINISTRAR AUTORES</h1>
@stop

@section('content')
    @if(session()->has('msj-create'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">{{ session('msj-create') }}</button>
            <strong>¡Datos guardados exitosamente!</strong> 
        </div>
    @elseif(session()->has('msj-delete'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">{{ session('msj-delete') }}</button>
            <strong>¡Autor eliminado exitosamente!</strong> 
        </div>
    @elseif(session()->has('msj-edit'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">{{ session('msj-edit') }}</button>
            <strong>¡Autor modificado exitosamente!</strong> 
        </div>
    @endif

    <a href="autores/create" class="btn btn-primary mb-3">CREAR</a>

    <table id="autores" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Observacion</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($autores as $autor)
            <tr>
                <td>{{ $autor->id }}</td>
                <td>{{ $autor->nombre }}</td>
                <td>{{ $autor->observacion }}</td>
                <td>
                    <div>
                        <a href="{{ route('autores.edit', $autor->id) }}" class="btn btn-info">Editar</a>
                        <form action="{{ route('autores.destroy', $autor->id) }}" method="POST"> 
                            @csrf
                            @method('DELETE')   
                            <button type="submit" class="btn btn-danger" id="boton-eliminar">Eliminar</button>
                        </form> 
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>    
    <script>
        $(document).ready(function() {
            $('#autores').DataTable();
        } );
    </script>
@stop
