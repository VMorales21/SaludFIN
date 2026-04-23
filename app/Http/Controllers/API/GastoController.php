<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Gasto;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    public function index()
    {
        return Gasto::with('perfil','categoria','detalles')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'idPerfil' => 'required|exists:perfiles,idPerfil',
            'idCategoria' => 'nullable|exists:categorias_gasto,idCategoria',
            'descripcion' => 'required',
            'monto' => 'required|numeric',
            'fecha' => 'required|date'
        ]);

        $gasto = Gasto::create($request->all());

        return response()->json($gasto, 201);
    }

    public function show($id)
    {
        return Gasto::with('perfil','categoria','detalles')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $gasto = Gasto::findOrFail($id);
        $gasto->update($request->all());

        return response()->json($gasto);
    }

    public function destroy($id)
    {
        Gasto::destroy($id);
        return response()->json(['mensaje' => 'Eliminado']);
    }
}