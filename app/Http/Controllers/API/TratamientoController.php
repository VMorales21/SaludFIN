<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    public function index() {
        return response()->json(Tratamiento::all());
    }

    public function show($id) {
        $data = Tratamiento::find($id);
        return $data ? response()->json($data)
                     : response()->json(['mensaje'=>'No encontrado'],404);
    }

    public function store(Request $request) {
        $request->validate([
            'nombre'=>'required'
        ]);

        return response()->json(Tratamiento::create($request->all()),201);
    }

    public function update(Request $request, $id) {
        $data = Tratamiento::find($id);
        if(!$data) return response()->json(['mensaje'=>'No encontrado'],404);

        $data->update($request->all());
        return response()->json($data);
    }

    public function destroy($id) {
        $data = Tratamiento::find($id);
        if(!$data) return response()->json(['mensaje'=>'No encontrado'],404);

        $data->delete();
        return response()->json(['mensaje'=>'Eliminado']);
    }
}