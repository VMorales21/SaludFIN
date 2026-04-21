<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetalleCosto;
use Illuminate\Http\Request;

class DetalleCostoController extends Controller
{
    public function index() {
        return response()->json(DetalleCosto::all());
    }

    public function show($id) {
        $data = DetalleCosto::find($id);
        return $data ? response()->json($data)
                     : response()->json(['mensaje'=>'No encontrado'],404);
    }

    public function store(Request $request) {
        $request->validate([
            'id_consulta'=>'required|integer',
            'tipo'=>'required',
            'costo'=>'required|numeric'
        ]);

        return response()->json(DetalleCosto::create($request->all()),201);
    }

    public function update(Request $request, $id) {
        $data = DetalleCosto::find($id);
        if(!$data) return response()->json(['mensaje'=>'No encontrado'],404);

        $data->update($request->all());
        return response()->json($data);
    }

    public function destroy($id) {
        $data = DetalleCosto::find($id);
        if(!$data) return response()->json(['mensaje'=>'No encontrado'],404);

        $data->delete();
        return response()->json(['mensaje'=>'Eliminado']);
    }
}