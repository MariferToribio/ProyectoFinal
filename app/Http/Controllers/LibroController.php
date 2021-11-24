<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Autor;
use Illuminate\Support\Facades\Gate;

class LibroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *\
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('administrar');

        $libros = Libro::all(); //Trae todos los registros de la tabla

        /*$datos = Libro::all();
        echo $datos; */


        return view('libros.librosIndex')->with('libros', $libros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        Gate::authorize('administrar');

        $autores = Autor::all();
        $editoriales = app('App\Http\Controllers\EditorialController')->getEditoriales();

        return view('libros.librosCreate', compact('editoriales', 'autores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        /*
        $libros = new Libro();
        $libros->codigo = $request->get('codigo');
        $libros->descripcion = $request->get('descripcion');
        $libros->cantidad = $request->get('cantidad');
        $libros->precio = $request->get('precio');
        $libros->save();


        #Crear instancia de modelo
        //$persona = new Persona();
        $ruta = $request->archivo->store('imagenes');
        //$mime = $request->archivo->getClientMimeType();
        $nombre_original = $request->archivo->getClientOriginalName();

    
        $request->merge([
            'archivo_original' => $nombre_original,
            'archivo_ruta' => $ruta
        ]); 
        #Agregar en fillable Persona.php
         
        //Persona::create($request->all());
        $libro = Libro::create($request->all());
        //$libro->areas()->attach($request->area_id);*/


        Gate::authorize('administrar');

        $request->validate([
            'titulo' => 'unique:libros|required|max:100',
            'categoria' => 'required|max:100',
            'autor_id' => 'required',
            'editorial_id' => 'required',
            'descripcion' => 'required|max:300',
            'cantidad' => 'required',
            'precio' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024',
        ]);

        $libro = $request->all();
        
        if($imagen = $request->file('imagen')){
            $rutaGuardarImg  = 'imagen/';
            $imagenLibro = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenLibro);
            $libro['imagen'] = "$imagenLibro";
        }
        
        $libroNuevo = Libro::create($libro);
        
        $libroNuevo->autors()->attach($request->autor_id);

        return redirect('/libros')->with('msj-create','x');

        //return redirect('/libros');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('administrar');

        $libro = Libro::find($id);
        $libro->load('autors');
        $autors = Autor::all();
        
        $editoriales = app('App\Http\Controllers\EditorialController')->getEditoriales();

        return view('libros.librosEdit', compact('libro', 'editoriales', 'autors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        Gate::authorize('administrar');

        $libro = Libro::find($id);

        $libro->titulo = $request->get('titulo');
        $libro->categoria = $request->get('categoria');
        $libro->descripcion = $request->get('descripcion');
        $libro->cantidad = $request->get('cantidad');
        $libro->precio = $request->get('precio');
        $libro->editorial_id = $request->get('editorial_id');

        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $rutaGuardarImg  = 'imagen/';
            $imagenLibro = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenLibro);
            $libro['imagen'] = "$imagenLibro";
        }

        $libro->save();
        $libro->autors()->sync($request->autor_id);

        return redirect('/libros')->with('msj-edit','x');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('administrar');

        $libro = Libro::find($id);
        $libro->delete();
        return redirect('/libros')->with('msj-delete','x');
    }

    public function carrito()
    {
        return view('libros.carritosIndex');
    }
}
