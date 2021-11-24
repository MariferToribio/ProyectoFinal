@extends('adminlte::page')

@section('title', 'Carrito de compras')

@section('content_header')
    <h1>CARRITO DE COMPRAS</h1>
@stop

@section('content')
 
    <table class="table table-light table-hover">
        <thead>
            <tr class="text-success">
                <th scope="col">#</th>
                <th scope="col">Libros</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
            </tr>
        </thead>
        <tbody class="tbody">
        </tbody>
    </table>
    <br><br>
    <div class="row mx-4">
        <div class="col">
            <h3 class="itemCartTotal text-white" id="itemTotal">Total: 0</h3>
        </div>
        <div class="col d-flex justify-content-end">
            <a href="login.html" class="btn btn-success">COMPRAR</a>
        </div>
    </div>

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