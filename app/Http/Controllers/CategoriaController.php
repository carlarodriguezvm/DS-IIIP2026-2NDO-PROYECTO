<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required'
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'descripcion.required' => 'La descripcion es obligatorio',
            'estado.required' => 'El estado es required'
        ]);

        Categoria::create($validated);

        return redirect()->route('categoria.index')->with('status', 'Categoria creada existosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
               $validated = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required'
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'descripcion.required' => 'La descripcion es obligatorio',
            'estado.required' => 'El estado es required'
        ]);

        $categoria->update($validated);
        return redirect()->route('categoria.index')->with('status', 'Categoria actualizada existosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria = Categoria::findorFail($id);
        $categoria->delete();

        return redirect()->route('categoria.index')->with('status', 'Categoria eliminada existosamente');

    }
}
