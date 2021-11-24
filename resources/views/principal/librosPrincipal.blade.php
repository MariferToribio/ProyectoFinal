@extends('adminlte::page')

@section('title', 'BookStore')

@section('content_header')
    <h1>LIBROS</h1>
@stop

@section('content')
    
    <style>
        .description{
            height: 25px;
            overflow: hidden;
            transition: height .3s ease-in .3s;
        }
        .description:hover{
            height: 200px;
        }
    </style>

    <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
    @foreach ($libros as $libro)
        <div class="col d-flex justify-content-center mb-4">
            <div class="card shadow mb-1 bg-light rounded" style="width: 20rem;">
                <h5 class="card-title pt-2 text-center text-success">{{ $libro->titulo }}</h5>
                <img src="/imagen/{{$libro->imagen}}" class="card-img-top">
                <div class="card-body">
                    <h6>{{ $libro->categoria }}</h6>
                    <p class="card-text text-dark-50 description">{{ $libro->descripcion }}</p>
                    <h5 class="text-success">Precio: <span class="precio">{{ $libro->precio }}</span></h5>
                    <div class="d-grid gap-2">
                        <button class="btn btn-success button" width="100%">Añadir a Carrito</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>

@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@stop

@section('js')
    <script src="./js/script.js"></script>
@stop