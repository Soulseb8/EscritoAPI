<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    
    public function update(Request $request, $id)
    {
        $persona = Persona::find($id);


        if(!$persona){
            $data = [
                'message' => 'Persona no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator=Validator::make($request->all().[
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'telefono' => 'required|digit:10'
        ]);

        if ($validator->fails()){
            $data = [
                'message' => 'error en la  validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->telefono = $request -> telefono;

        $student->save();

        $data = [
            'message' => 'Persona Actualizada',
            'persona' => $persona,
            'status' => 200
        ];
        return response()->json($data, 200);

    }

    public function updatePartial (Request $request, $id){
        $persona = Persona::find($id);

        if(!$persona){
            $data = [
                'message' => 'Persona no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator=Validator::make($request->all().[
            'nombre' => 'max:255',
            'apellido' => 'max:255',
            'telefono' => 'digits:10'
        ]);
        if ($validator->fails()){
            $data = [
                'message' => 'error en la  validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if($request->has('nombre')){
            $persona->nombre = $request->nombre;
        }

        if($request->has('apellido')){
            $persona->apellido = $request->apellido;
        }

        if($request->has('telefono')){
            $persona->telefono = $request->telefono;
        }
        
        $persona->save();

        $data = [
            'message' => 'Persona Actualizada',
            'Persona' => $persona,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

}
