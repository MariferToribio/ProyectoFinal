@extends('adminlte::page')

@section('title', 'Crear libro')

@section('content_header')
    <h1>AGREGAR LIBRO</h1>
@stop

@section('content')
    <form action="/libros" method="POST" enctype="multipart/form-data"> 
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Titulo</label>
            <input id="titulo" name="titulo" type="text" class="form-control" autocomplete="off">    
        </div>
        <div class="alert-danger">
            {{ $errors->first('titulo') }}
        </div>
        <div class="mb-3">
            <label for="autor_id">Autor</label>
            <select class="form-control" name="autor_id[]" id="autor_id" multiple>
            @foreach($autores as $autor)
                <option value="{{ $autor->id }}">{{ $autor->nombre }}</option>
            @endforeach
            </select>
        </div>
        <div class="alert-danger">
            {{ $errors->first('autor_id') }}
        </div>
        <div class="mb-3">
            <label for="editorial_id">Editorial</label>
            <select class="form-control" name="editorial_id">
            @foreach($editoriales as $editorial)
                <option value="{{ $editorial->id }}">{{ $editorial->nombre }}</option>
            @endforeach
            </select>
        </div>
        <div class="alert-danger">
            {{ $errors->first('editorial_id') }}
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <input id="categoria" name="categoria" type="text" class="form-control" autocomplete="off">    
        </div>
        <div class="alert-danger">
            {{ $errors->first('categoria') }}
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control" autocomplete="off">
        </div>
        <div class="alert-danger">
            {{ $errors->first('descripcion') }}
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input id="cantidad" name="cantidad" type="number" class="form-control">
        </div>
        <div class="alert-danger">
            {{ $errors->first('cantidad') }}
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input id="precio" name="precio" type="number" step="any" value="0.00" class="form-control">
        </div>
        <div class="alert-danger">
            {{ $errors->first('precio') }}
        </div>
        <div>
            <img id="imagenSeleccionada" width="200px">           
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Portada</label>
            <input id="imagen" name="imagen" type="file" class="form-control">
        </div>
        <div class="alert-danger">
            {{ $errors->first('imagen') }}
        </div>
        <a href="/libros" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary" id="boton-crear">Guardar</button>
    </form>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css rel="stylesheet">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>   
    $(document).ready(function (e) {   
        $('#imagen').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenSeleccionada').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
</script>

@stop