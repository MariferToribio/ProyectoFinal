<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Editorial;
use App\Models\Autor;

class FrontController extends Controller
{
    public function index()
    {
        $editoriales = Editorial::all();
        $autores = Autor::all();
        $libros = Libro::all();
        $data = ['success' => true, 
                'editoriales' => $editoriales, 
                'autores' => $autores,
                'libros' => $libros
                ];

        return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }
}
