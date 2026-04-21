<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    // Enfermedades más frecuentes
    public function enfermedadesFrecuentes()
    {
        $data = DB::table('consultas as c')
            ->join('enfermedades as e', 'c.id_enfermedad', '=', 'e.id_enfermedad')
            ->select('e.nombre as enfermedad', DB::raw('COUNT(*) as frecuencia'))
            ->groupBy('e.nombre')
            ->orderByDesc('frecuencia')
            ->get();

        return response()->json($data);
    }

    // Gasto por paciente
    public function gastoPorPaciente()
    {
        $data = DB::table('consultas as c')
            ->join('pacientes as p', 'c.id_paciente', '=', 'p.id_paciente')
            ->select('p.nombre as paciente', DB::raw('SUM(c.costo_total) as gasto_total'))
            ->groupBy('p.nombre')
            ->orderByDesc('gasto_total')
            ->get();

        return response()->json($data);
    }

    //Costos por tratamiento
    public function costosPorTratamiento()
    {
        $data = DB::table('consultas as c')
            ->join('tratamientos as t', 'c.id_tratamiento', '=', 't.id_tratamiento')
            ->select('t.nombre as tratamiento', DB::raw('SUM(c.costo_total) as costo_total'))
            ->groupBy('t.nombre')
            ->orderByDesc('costo_total')
            ->get();

        return response()->json($data);
    }

    //  gasto por tipo
    public function gastoPorTipo()
    {
        $data = DB::table('detalle_costos')
            ->select('tipo', DB::raw('SUM(costo) as total'))
            ->groupBy('tipo')
            ->orderByDesc('total')
            ->get();

        return response()->json($data);
    }
}