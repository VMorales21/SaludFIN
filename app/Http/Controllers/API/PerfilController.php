<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        return Perfil::with('usuario')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'idUsuario' => 'required|exists:usuarios,idUsuario',
            'nombre' => 'required'
        ]);

        return Perfil::create($request->all());
    }

    public function show($id)
    {
        return Perfil::with('gastos')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $perfil = Perfil::findOrFail($id);
        $perfil->update($request->all());

        return $perfil;
    }

    public function destroy($id)
    {
        Perfil::destroy($id);
        return response()->json(['mensaje'=>'Eliminado']);
    }
}