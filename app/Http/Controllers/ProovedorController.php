<?php

namespace App\Http\Controllers;

use App\Models\Proovedor;
use Illuminate\Http\Request;

class ProovedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proovedores = Proovedor::all();
        return view('proovedors.index', compact('proovedores'));
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
        $validate = $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'fecha_enrrolamiento' => 'required',
            'estado' => 'required',
        ]);

        Proovedor::create($validate);
        return redirect()->route('proovedor.index')->with('status', 'Proveedor creado bien');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proovedor $proovedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proovedor $proovedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proovedor $proovedor)
    {
        $validate = $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'fecha_enrrolamiento' => 'required',
            'estado' => 'required',
        ]);

        Proovedor::update($validate);

        return redirect->route('proovedor.index')->with('Status', 'Proovedor actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proovedor = Proovedor::findOrFail($id);
        $proovedor->delete();

        return redirect->route('proovedor.index')->with('Status', 'Proovedor eliminado');

    }
}
