<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index() {
        return response()->json(Paciente::all());
    }

    public function show($id) {
        $data = Paciente::find($id);
        return $data ? response()->json($data)
                     : response()->json(['mensaje'=>'No encontrado'],404);
    }

    public function store(Request $request) {
        $request->validate([
            'nombre'=>'required',
            'edad'=>'required|integer',
            'sexo'=>'required'
        ]);

        return response()->json(Paciente::create($request->all()),201);
    }

    public function update(Request $request, $id) {
        $data = Paciente::find($id);
        if(!$data) return response()->json(['mensaje'=>'No encontrado'],404);

        $data->update($request->all());
        return response()->json($data);
    }

    public function destroy($id) {
        $data = Paciente::find($id);
        if(!$data) return response()->json(['mensaje'=>'No encontrado'],404);

        $data->delete();
        return response()->json(['mensaje'=>'Eliminado']);
    }
}