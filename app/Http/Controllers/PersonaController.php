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
            'name' => 'required',
            'apellido' =>'required',
            'telefono' => 'required'
        ]);
        if($validator->fails()){
            $data = [
                'message' => 'error en la validacion de datos',
                'error' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response


     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
