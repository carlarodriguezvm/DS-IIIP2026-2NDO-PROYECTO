<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $clientes = Cliente::all();
        $clientes = Cliente::withoutTrashed()->get();
        //$clientes = Cliente::where('estado', 'activo')->get(['codigo', 'email']);

        //return dd($clientes);
        return view('clientes.index', compact('clientes'));
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
            'codigo' => 'required|string|max:20|min:3',
            'nombre' => 'required|string|max:100|min:3',
            'email' => 'required|string|max:100|min:3',
            'telefono' => 'required|string|max:20|min:3',
            'direccion' => 'required',

        ], [
                    'codigo.required' => 'El codigo es obligatorio.',
                    'codigo.max' => 'El codigo tiene un maximo',
                    'nombre.required' => 'El nombre es obligatorio.',
                    'email.required' => 'El email es obligatorio.',
                    'telefono.required' => 'El teléfono es obligatorio.',
                    'direccion.required' => 'La dirección es obligatoria.'
                ]
        );

        Cliente::create($validated);

        return redirect()->route('cliente.index')->with('status', 'Cliente registrado correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
                $validated = $request->validate([
            'codigo' => 'required|string|max:20|min:3',
            'nombre' => 'required|string|max:100|min:3',
            'email' => 'required|string|max:100|min:3',
            'telefono' => 'required|string|max:20|min:3',
            'direccion' => 'required',
                ],[
                    'codigo.required' => 'El codigo es obligatorio.',
                    'nombre.required' => 'El nombre es obligatorio.',
                    'email.required' => 'El email es obligatorio.',
                    'telefono.required' => 'El teléfono es obligatorio.',
                    'direccion.required' => 'La dirección es obligatoria.'
                ]);

                $cliente->update($validated);

                return redirect()
                    ->route('cliente.index')
                    ->with('status', 'Cliente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()
        ->route('cliente.index')->with('status', 'Cliente ha sido elimando correctamente!');
    }
}
