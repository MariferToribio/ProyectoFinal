<?php

namespace App\Http\Controllers;
use App\Models\Editorial;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class EditorialController extends Controller
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

        $editoriales = Editorial::all();
        
        return view('editoriales.editorialesIndex')->with('editoriales', $editoriales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('administrar');

        return view('editoriales.editorialesCreate');
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
            'nombre' => 'required|unique:editorials|max:100'
        ]);

        $editorial = $request->all();

        Editorial::create($editorial);
        return redirect('/editoriales')->with('msj-create','x');
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

        $editorial = Editorial::find($id);
        return view('editoriales.editorialesEdit')->with('editorial', $editorial);
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

        $editorial = Editorial::find($id);

        $editorial->nombre = $request->get('nombre');

        $editorial->save();
        return redirect('/editoriales')->with('msj-edit','x');
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

        $editorial = Editorial::find($id);
        $editorial->delete();
        return redirect('/editoriales')->with('msj-delete','x');
    }

    public function getEditoriales() 
    {
        $editoriales = Editorial::all();

        return $editoriales;
    }
}
