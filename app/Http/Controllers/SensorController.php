<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function visualizar($codigo){
        $sensor = Sensor::where('codigo', $codigo)->first();

        if (!$sensor) { //negação
            return response()->json(['error' => 'sensor não encontrado'], 404);
        }
        return response()->json([
            'success' => 'Registro encontrado com sucesso',
            'status' => $sensor->status
        ], 200);
    }

    public function atualizar (Request $request)
    {
        $sensor = Sensor::where('codigo', $request->codigo)->first();

        if ($sensor == null){
            return response()->json([
                'status' => false,
                'message' => 'Sensor não encontrado'
            ]);
        }

        if (isset($request->status)){
            $sensor->status = $request->status;
        }

        $sensor->update();

        return response()->json([
            'status' => true,
            'message' => 'Atualizado'
        ]);      
    }

    public function listar(){
        $sensor = Sensor::all('codigo', 'tipo', 'status');

        return response()->json([
            'success' => 'Registros encontrados com sucesso',
            'data' => $sensor
        ], 200);
    }
}
