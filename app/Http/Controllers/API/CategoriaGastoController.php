<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CategoriaGasto;
use Illuminate\Http\Request;

class CategoriaGastoController extends Controller
{
    public function index()
    {
        return CategoriaGasto::all();
    }

    public function store(Request $request)
    {
        return CategoriaGasto::create($request->all());
    }

    public function show($id)
    {
        return CategoriaGasto::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $cat = CategoriaGasto::findOrFail($id);
        $cat->update($request->all());

        return $cat;
    }

    public function destroy($id)
    {
        CategoriaGasto::destroy($id);
        return response()->json(['mensaje'=>'Eliminado']);
    }
}