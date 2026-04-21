<?php
use App\Http\Controllers\API\PacienteController;
use App\Http\Controllers\API\EnfermedadController;
use App\Http\Controllers\API\TratamientoController;
use App\Http\Controllers\API\ConsultaController;
use App\Http\Controllers\API\DetalleCostoController;
use App\Http\Controllers\API\ReporteController;

Route::apiResource('pacientes', PacienteController::class);
Route::apiResource('enfermedades', EnfermedadController::class);
Route::apiResource('tratamientos', TratamientoController::class);
Route::apiResource('consultas', ConsultaController::class);
Route::apiResource('detalle-costos', DetalleCostoController::class);
// rutas para  los reportes
Route::get('/enfermedades-frecuentes', [ReporteController::class, 'enfermedadesFrecuentes']);
Route::get('/gasto-paciente', [ReporteController::class, 'gastoPorPaciente']);
Route::get('/costos-tratamiento', [ReporteController::class, 'costosPorTratamiento']);
Route::get('/gasto-tipo', [ReporteController::class, 'gastoPorTipo']);