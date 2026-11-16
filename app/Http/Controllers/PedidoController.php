<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Empleado;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::with(['cliente', 'empleado'])->get();

        return view('pedidos.index', compact('pedidos'));
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
            'cliente_id' => 'required',
            'empleado_id' => 'required',
            'numero_pedido' => 'required',
            'fecha_pedido' => 'required',
            'fecha_entrega' => 'required',
            'total' => 'required',
            'estado' => 'required',
        ], ['cliente_id.required' => 'El campo cliente es obligatorio',
            'empleado_id.required' => 'El campo empleado es obligatorio',
            'numero_pedido.required' => 'El campo número de pedido es obligatorio',
            'fecha_pedido.required' => 'El campo fecha de pedido es obligatorio',
            'fecha_entrega.required' => 'El campo fecha de entrega es obligatorio',
            'total.required' => 'El campo total es obligatorio',
            'estado.required' => 'El campo estado es obligatorio',
        ]);

        Pedido::create($validated);

        return redirect()->route('pedido.index')->with('status','Pedido registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
                $validated = $request->validate([
            'cliente_id' => 'required',
            'empleado_id' => 'required',
            'numero_pedido' => 'required',
            'fecha_pedido' => 'required',
            'fecha_entrega' => 'required',
            'total' => 'required',
            'estado' => 'required',

        ], ['cliente_id.required' => 'El campo cliente es obligatorio',
            'empleado_id.required' => 'El campo empleado es obligatorio',
            'numero_pedido.required' => 'El campo número de pedido es obligatorio',
            'fecha_pedido.required' => 'El campo fecha de pedido es obligatorio',
            'fecha_entrega.required' => 'El campo fecha de entrega es obligatorio',
            'total.required' => 'El campo total es obligatorio',
            'estado.required' => 'El campo estado es obligatorio',
        ]);

        $pedido->update($validated);

                return redirect()->route('pedido.index')->with('status','Pedido actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pedido = Pedido::findorFail($id);
        $pedido->delete();

    return redirect()->route('pedido.index')->with('status','Pedido Eliminado correctamente');

    }
}
