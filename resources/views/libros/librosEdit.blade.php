@extends('adminlte::page')

@section('title', 'Editar libro')

@section('content_header')
    <h1>EDITAR LIBRO</h1>
@stop

@section('content')
    <form action=" {{ route('libros.update', $libro) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo" class="form-label">Titulo</label>
            <input id="titulo" name="titulo" type="text" class="form-control" value="{{ $libro->titulo }}">    
        </div>
        <div class="mb-3">
            <label for="autor_id">Autor</label>
            <select class="form-control" name="autor_id[]" id="autor_id" multiple>
            @foreach($autors as $autor)
                <option value="{{ $autor->id }}" {{ isset($libro) && array_search($autor->id, $libro->autors->pluck('id')->toArray()) !== false ? 'selected' : '' }}>
                    {{ $autor->nombre }}
                </option>
            @endforeach
            </select>

        </div>
        <div class="mb-3">
            <label for="editorial_id">Editorial </label>
            <select class="form-control" name="editorial_id">
            @foreach($editoriales as $editorial)
                <option value="{{ $editorial->id }}" {{ isset($libro) && array_search($editorial->id, $libro->editorial->pluck('id')->toArray()) !== false ? 'selected' : '' }}>
                    {{ $editorial->nombre }}
                </option>
            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <input id="categoria" name="categoria" type="text" class="form-control" tabindex="1"  value="{{ $libro->categoria }}">    
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="2"  value="{{ $libro->descripcion }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Cantidad</label>
            <input id="cantidad" name="cantidad" type="number" class="form-control" value="{{ $libro->cantidad }}"> 
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Precio</label>
            <input id="precio" name="precio" type="number" step="any" class="form-control" value="{{ $libro->precio }}">
        </div>
        <div>
            <img src="/imagen/{{ $libro->imagen }}" id="imagenSeleccionada" width="200px">           
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Portada</label>
            <input id="imagen" name="imagen" type="file" class="form-control">
        </div>
        <a href="/libros" class="btn btn-secondary" >Cancelar</a>
        <button type="submit" class="btn btn-primary" id="boton-editar">Guardar</button>
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