<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ingreso;
use Illuminate\Http\Request;

class IngresoController extends Controller
{
    public function index()
    {
        return Ingreso::all();
    }

    public function store(Request $request)
    {
        return Ingreso::create($request->all());
    }

    public function show($id)
    {
        return Ingreso::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $i = Ingreso::findOrFail($id);
        $i->update($request->all());

        return $i;
    }

    public function destroy($id)
    {
        Ingreso::destroy($id);
        return response()->json(['mensaje'=>'Eliminado']);
    }
}