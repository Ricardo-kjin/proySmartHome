<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioApiController extends Controller
{
    public function getHorarioByCodigoDispositivo($codigoDispositivo)
    {
        // Encuentra el dispositivo por su código
        $dispositivo = Dispositivo::where('codigo', $codigoDispositivo)->first();

        if ($dispositivo && $dispositivo->estado === 'habilitado') {
            // Encuentra el horario habilitado asociado a este dispositivo
            $horario = Horario::where('dispositivo_id', $dispositivo->id)
                                ->where('estado', 'habilitado')
                                ->first();

            if ($horario) {
                return response()->json(['hora' => $horario->hora]);
            } else {
                return response()->json(['error' => 'No hay horario habilitado asociado a este dispositivo.'], 404);
            }
        } else {
            return response()->json(['error' => 'Dispositivo no encontrado o no habilitado.'], 404);
        }
    }
}
