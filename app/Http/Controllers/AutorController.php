<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('administrar');
        
        $autores = Autor::all();
        
        return view('autores.autoresIndex')->with('autores', $autores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('administrar');

        return view('autores.autoresCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('administrar');

        $request->validate([
            'nombre' => 'required|unique:autores|max:100',
            'observacion' => 'max:255',
        ]);

        $autor = $request->all();

        Autor::create($autor);
        return redirect('/autores')->with('msj-create','x');
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

        $autor = Autor::find($id);
        return view('autores.autoresEdit')->with('autor', $autor);
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

        $autor = Autor::find($id);

        $autor->nombre = $request->get('nombre');
        $autor->observacion = $request->get('observacion');

        $autor->save();
        return redirect('/autores')->with('msj-edit','x');
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
        
        $autor = Autor::find($id);
        $autor->delete();
        return redirect('/autores')->with('msj-delete','x');
    }
}
