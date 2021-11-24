@extends('adminlte::page')

@section('title', 'Editar editorial')

@section('content_header')
    <h1>EDITAR EDITORIAL</h1>
@stop

@section('content')
    <form action=" {{ route('editoriales.update', $editorial->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" value="{{ $editorial->nombre }}">
        </div>
        <a href="/editoriales" class="btn btn-secondary" >Cancelar</a>
        <button type="submit" class="btn btn-primary" id="boton-editar">Guardar</button>
    </form>
@stop  

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop