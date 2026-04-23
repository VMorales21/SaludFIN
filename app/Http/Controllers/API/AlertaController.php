<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Alerta;
use Illuminate\Http\Request;

class AlertaController extends Controller
{
    // Listar todas las alertas
    public function index()
    {
        return Alerta::with('usuario')->get();
    }

    // Crear alerta
    public function store(Request $request)
    {
        $request->validate([
            'idUsuario' => 'required|exists:usuarios,idUsuario',
            'tipo' => 'required|string|max:50',
            'mensaje' => 'required|string'
        ]);

        $alerta = Alerta::create($request->all());

        return response()->json($alerta, 201);
    }

    // Mostrar una alerta
    public function show($id)
    {
        return Alerta::with('usuario')->findOrFail($id);
    }

    // Actualizar alerta
    public function update(Request $request, $id)
    {
        $alerta = Alerta::findOrFail($id);

        $request->validate([
            'idUsuario' => 'sometimes|exists:usuarios,idUsuario',
            'tipo' => 'sometimes|string|max:50',
            'mensaje' => 'sometimes|string'
        ]);

        $alerta->update($request->all());

        return response()->json($alerta);
    }

    //  Eliminar alerta
    public function destroy($id)
    {
        Alerta::destroy($id);

        return response()->json([
            'mensaje' => 'Alerta eliminada correctamente'
        ]);
    }

    // EXTRA: Alertas por usuario
    public function porUsuario($idUsuario)
    {
        $alertas = Alerta::where('idUsuario', $idUsuario)->get();

        return response()->json($alertas);
    }
}