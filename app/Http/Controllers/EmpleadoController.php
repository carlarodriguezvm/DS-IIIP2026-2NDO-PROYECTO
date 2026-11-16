<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
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
            'email' => 'required|string|min:3',
            'cargo' => 'required|string|min:3',
            'fecha_contratacion' => 'required',
            'estado' => 'required',

        ],[
            'codigo.required' => 'El codigo es obligatorio',
            'codigo.min' => 'El codigo tiene que tener minimo 3 caracteres',
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.min' => 'El nombre tiene que tener minimo 3 caracteres',
            'email.required' => 'El email es obligatorio',
            'email.min' => 'El email tiene que tener minimo 3 caracteres',
            'cargo.required' => 'El cargo es obligatorio',
            'cargo.min' => 'El cargo tiene que tener minimo 3 caracteres',
            'fecha_contratacion.required' => 'La fecha de contratación es obligatoria',
            'estado.required' => 'El estado es obligatorio',

        ]);
        Empleado::create($validated);

        return redirect()->route('empleado.index')->with('status', 'Empleado registrado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|min:3',
            'nombre' => 'required|string|min:3',
            'email' => 'required|string|min:3',
            'cargo' => 'required|string|min:3',
            'fecha_contratacion' => 'required',
            'estado' => 'required',

        ],[
            'codigo.required' => 'El codigo es obligatorio',
            'codigo.min' => 'El codigo tiene que tener minimo 3 caracteres',
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.min' => 'El nombre tiene que tener minimo 3 caracteres',
            'email.required' => 'El email es obligatorio',
            'email.min' => 'El email tiene que tener minimo 3 caracteres',
            'cargo.required' => 'El cargo es obligatorio',
            'cargo.min' => 'El cargo tiene que tener minimo 3 caracteres',
            'fecha_contratacion.required' => 'La fecha de contratación es obligatoria',
            'estado.required' => 'El estado es obligatorio',

        ]);

        $empleado -> update($validated);
        return redirect()
        ->route('empleado.index')->with('status', 'Empleado actualizada exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return redirect()
        ->route('empleado.index')->with('status', 'Empleado eliminado exitosamente');
}

}