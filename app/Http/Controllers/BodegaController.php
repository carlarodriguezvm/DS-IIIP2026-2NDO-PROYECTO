<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bodegas = Bodega::all();
        return view('bodegas.index', compact('bodegas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|min:3',
            'nombre' => 'required|string|min:3',
            'descripcion' => 'required|string|min:3',
        ],[
            'codigo.required' => 'El codigo es obligatorio',
            'nombre.required' => 'El nombre es obligatorio',
            'descripcion.required' => 'La descripcion es obligatorio',
                ]);

        Bodega::create($validated);

        return redirect()->route('bodega.index')->with('status', 'Bodega registrada correctamente!');
        }

    /**
     * Display the specified resource.
     */
    public function show(Bodega $bodega)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bodega $bodega)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bodega $bodega)
    {
                        $validated = $request->validate([
            'codigo' => 'required|string|min:3',
            'nombre' => 'required|string|min:3',
            'descripcion' => 'required|string|min:3',
                ],[
            'codigo.required' => 'El codigo es obligatorio',
            'nombre.required' => 'El nombre es obligatorio',
            'descripcion.required' => 'La descripcion es obligatorio',
                ]);

                $bodega->update($validated);

                return redirect()
                    ->route('bodega.index')
                    ->with('status', 'Bodega actualizada correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bodega = Bodega::findOrFail($id);
        $bodega->delete();

        return redirect()
        ->route('bodega.index')->with('status', 'Bodega ha sido elimando correctamente!');
    }
}
