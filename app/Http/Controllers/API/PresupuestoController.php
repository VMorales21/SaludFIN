<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Presupuesto;
use Illuminate\Http\Request;

class PresupuestoController extends Controller
{
    public function index()
    {
        return Presupuesto::all();
    }

    public function store(Request $request)
    {
        return Presupuesto::create($request->all());
    }

    public function show($id)
    {
        return Presupuesto::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $p = Presupuesto::findOrFail($id);
        $p->update($request->all());

        return $p;
    }

    public function destroy($id)
    {
        Presupuesto::destroy($id);
        return response()->json(['mensaje'=>'Eliminado']);
    }
}