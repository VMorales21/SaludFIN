<?php
use App\Http\Controllers\API\UsuarioController;
use App\Http\Controllers\API\PerfilController;
use App\Http\Controllers\API\CategoriaGastoController;
use App\Http\Controllers\API\GastoController;
use App\Http\Controllers\API\IngresoController;
use App\Http\Controllers\API\PresupuestoController;
use App\Http\Controllers\API\AlertaController;
use App\Http\Controllers\API\ConsultaController;
use App\Http\Controllers\API\DetalleGastoController;


Route::apiResource('detalle-gastos', DetalleGastoController::class);
Route::apiResource('consultas', ConsultaController::class);
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('perfiles', PerfilController::class);
Route::apiResource('categorias', CategoriaGastoController::class);
Route::apiResource('gastos', GastoController::class);
Route::apiResource('ingresos', IngresoController::class);
Route::apiResource('presupuestos', PresupuestoController::class);
Route::apiResource('alertas', AlertaController::class);
//consultas
Route::apiResources([
    'gastos/usuario' => GastoController::class,
    'ingresos/usuario' => IngresoController::class,
    'presupuestos/usuario' => PresupuestoController::class,
]);


// Ruta extra
Route::get('alertas/usuario/{idUsuario}', [AlertaController::class, 'porUsuario']);