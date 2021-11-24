@extends('adminlte::page')

@section('title', 'Editar autor')

@section('content_header')
    <h1>EDITAR AUTOR</h1>
@stop

@section('content')
    <form action=" {{ route('autores.update', $autor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" value="{{ $autor->nombre }}">
        </div>
        <div class="mb-3">
            <label for="observacion" class="form-label">Observacion</label>
            <input id="observacion" name="observacion" type="text" class="form-control" value="{{ $autor->observacion }}">
        </div> 
        <a href="/autores" class="btn btn-secondary" >Cancelar</a>
        <button type="submit" class="btn btn-primary" id="boton-editar">Guardar</button>
    </form>
@stop  

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop