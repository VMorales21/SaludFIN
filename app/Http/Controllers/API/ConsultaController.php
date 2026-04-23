<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    // 🔹 Listar todas las consultas
    public function index()
    {
        return Consulta::with('perfil')->get();
    }

    // 🔹 Crear nueva consulta
    public function store(Request $request)
    {
        $request->validate([
            'idPerfil' => 'required|exists:perfiles,idPerfil',
            'fecha' => 'required|date',
            'doctor' => 'required|string|max:150',
            'motivo' => 'required|string',
            'costo' => 'required|numeric'
        ]);

        $consulta = Consulta::create($request->all());

        return response()->json($consulta, 201);
    }

    // 🔹 Mostrar una consulta específica
    public function show($id)
    {
        return Consulta::with('perfil')->findOrFail($id);
    }

    // 🔹 Actualizar consulta
    public function update(Request $request, $id)
    {
        $consulta = Consulta::findOrFail($id);

        $request->validate([
            'idPerfil' => 'sometimes|exists:perfiles,idPerfil',
            'fecha' => 'sometimes|date',
            'doctor' => 'sometimes|string|max:150',
            'motivo' => 'sometimes|string',
            'costo' => 'sometimes|numeric'
        ]);

        $consulta->update($request->all());

        return response()->json($consulta);
    }

    // 🔹 Eliminar consulta
    public function destroy($id)
    {
        Consulta::destroy($id);

        return response()->json([
            'mensaje' => 'Consulta eliminada correctamente'
        ]);
    }
}