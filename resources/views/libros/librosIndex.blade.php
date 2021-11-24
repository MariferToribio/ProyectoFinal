@extends('adminlte::page')

@section('title', 'BookStore')

@section('content_header')
    <h1>ADMINISTRAR LIBROS</h1>
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
            <strong>¡Libro eliminado exitosamente!</strong> 
        </div>
    @elseif(session()->has('msj-edit'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">{{ session('msj-edit') }}</button>
            <strong>¡Libro modificado exitosamente!</strong> 
        </div>
    @endif

    <a href="libros/create" class="btn btn-primary mb-3">CREAR</a>

    <table id="libros" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Portada</th>
                <th scope="col">Titulo</th>
                <th scope="col">Autor</th>
                <th scope="col">Editorial</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($libros as $libro)
            <tr>
                <td>{{ $libro->id }}</td>
                <td>
                    <img src="/imagen/{{$libro->imagen}}" width="30%"  height="50%">
                </td>
                <td>{{ $libro->titulo }}</td>
                <td>
                    @foreach($libro->autors as $autor)
                        <li>{{ $autor->nombre }}</li>
                    @endforeach
                </td>
                <td>{{ $libro->editorial->nombre }}</td>
                <td>
                    <div>
                        <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-info">Editar</a>
                        <form action="{{ route('libros.destroy', $libro->id) }}" method="POST"> 
                            @csrf
                            @method('DELETE')   
                            <button type="submit" class="btn btn-danger" id="btn-eliminar">Eliminar</button>
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
            $('#libros').DataTable();
        } );
    </script>
@stop
