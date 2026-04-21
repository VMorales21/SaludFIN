<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index() {
        return response()->json(
            Consulta::with(['paciente','enfermedad','tratamiento'])->get()
        );
    }

    public function show($id) {
        $data = Consulta::with(['paciente','enfermedad','tratamiento'])->find($id);

        return $data ? response()->json($data)
                     : response()->json(['mensaje'=>'No encontrado'],404);
    }

    public function store(Request $request) {
        $request->validate([
            'id_paciente'=>'required|integer',
            'id_enfermedad'=>'required|integer',
            'id_tratamiento'=>'required|integer',
            'fecha'=>'required|date',
            'costo_total'=>'required|numeric'
        ]);

        return response()->json(Consulta::create($request->all()),201);
    }

    public function update(Request $request, $id) {
        $data = Consulta::find($id);
        if(!$data) return response()->json(['mensaje'=>'No encontrado'],404);

        $data->update($request->all());
        return response()->json($data);
    }

    public function destroy($id) {
        $data = Consulta::find($id);
        if(!$data) return response()->json(['mensaje'=>'No encontrado'],404);

        $data->delete();
        return response()->json(['mensaje'=>'Eliminado']);
    }
}