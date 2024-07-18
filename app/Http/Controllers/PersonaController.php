<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Persona;


use Illuminate\Support\Facades\Validator;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::all();

        if ($personas->isEmpty()) {
            $data = [
                'message' => 'No se encontraron personas',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'personas' => $personas,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'apellido' => 'required|max:255',
            'telefono' => 'required|digits:10'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $persona = Persona::create([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono
        ]);

        if (!$persona) {
            $data = [
                'message' => 'Error al crear la persona',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'persona' => $persona,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id)
    {
        $persona = Persona::find($id);

        if (!$persona) {
            $data = [
                'message' => 'Persona no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'persona' => $persona,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $persona = Persona::find($id);

        if (!$persona) {
            $data = [
                'message' => 'Persona no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $persona->delete();

        $data = [
            'message' => 'Persona eliminada',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}

    function update(Request $request, $id)
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

     function updatePartial (Request $request, $id){
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




    