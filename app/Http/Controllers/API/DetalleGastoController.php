<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetalleGasto;
use Illuminate\Http\Request;

class DetalleGastoController extends Controller
{
    // Listar todos los detalles
    public function index()
    {
        return DetalleGasto::with('gasto')->get();
    }

    //  Crear detalle de gasto
    public function store(Request $request)
    {
        $request->validate([
            'idGasto' => 'required|exists:gastos,idGasto',
            'concepto' => 'required|string|max:150',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'subtotal' => 'required|numeric|min:0'
        ]);

        $detalle = DetalleGasto::create($request->all());

        return response()->json($detalle, 201);
    }

    //  Mostrar un detalle específico
    public function show($id)
    {
        return DetalleGasto::with('gasto')->findOrFail($id);
    }

    // Actualizar detalle
    public function update(Request $request, $id)
    {
        $detalle = DetalleGasto::findOrFail($id);

        $request->validate([
            'idGasto' => 'sometimes|exists:gastos,idGasto',
            'concepto' => 'sometimes|string|max:150',
            'cantidad' => 'sometimes|integer|min:1',
            'precio_unitario' => 'sometimes|numeric|min:0',
            'subtotal' => 'sometimes|numeric|min:0'
        ]);

        $detalle->update($request->all());

        return response()->json($detalle);
    }

    // Eliminar detalle
    public function destroy($id)
    {
        DetalleGasto::destroy($id);

        return response()->json([
            'mensaje' => 'Detalle de gasto eliminado correctamente'
        ]);
    }

    // EXTRA: Obtener detalles por gasto
    public function porGasto($idGasto)
    {
        return DetalleGasto::where('idGasto', $idGasto)->get();
    }
}