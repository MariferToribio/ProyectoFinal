@extends('adminlte::page')

@section('title', 'Crear editorial')

@section('content_header')
    <h1>AGREGAR EDITORIAL</h1>
@stop

@section('content')
    <form action="/editoriales" method="POST"> 
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" autocomplete="off" required>    
        </div>
        <div class="alert-danger">
            {{ $errors->first('nombre') }}
        </div>
        <a href="/editoriales" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary" id="boton-crear">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css rel="stylesheet">
@stop

@section('js')
@stop