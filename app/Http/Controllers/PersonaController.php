<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Persona;


use Illuminate\Support\Facades\Validator;

class PersonaController extends Controller
{
<<<<<<< HEAD

=======
  
>>>>>>> busquedaylistado
    public function index()
    {
        $persona = Persona::all();

<<<<<<< HEAD
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

=======
        if ($persona->isEmpty()){
            $data = [
                'message' => 'No se encontraron personas',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        return response() ->json($persona, 200);
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = persona::find($id);

        if(!$persona){
            $data = [
                'message' => 'Estudiante no encontrado',
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
>>>>>>> busquedaylistado
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

    