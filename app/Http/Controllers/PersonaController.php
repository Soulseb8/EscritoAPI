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
        $persona = Persona::all();

        $data = [
            'persona' => $persona,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function store(request $request){
        
        $validator = Validator::make($Request->all(),[
            'name' => 'required|max:255',
            'apellido' =>'required|max:255',
            'telefono' => 'required|digits:10'
        ]);
        if($validator->fails()){
            $data = [
                'message' => 'error en la validacion de datos',
                'error' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $persona = Persona::create([
            'name' => $request->name,
            'apellido'=> $request->email,
            'telefono'=> $request->telefono
        ]);
        
        if (!$persona){
            $data = [
                'message' => "Error al crear la persona",
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
}

    