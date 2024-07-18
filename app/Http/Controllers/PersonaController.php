<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
   
    public function destroy($id)
    {
        $persona = Persona::find($id);

        if(!$student){
            $data = [
                'message' => 'persona no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $student ->delete();

        $data = [
            'message' => 'Persona Eliminada',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
