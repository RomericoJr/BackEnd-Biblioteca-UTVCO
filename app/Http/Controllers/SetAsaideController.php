<?php

namespace App\Http\Controllers;

use App\Models\Set_asaide as Apartados;
use Illuminate\Http\Request;

class SetAsaideController extends Controller
{
    public function getApartados(){
        $apartados = Apartados::all();
        return response($apartados, 200);
    }

    public function getApartadoById($id){
        $apartado = Apartados::find($id);
        if($apartado){
            return response($apartado, 200);
        } else {
            return response(['message' => 'not found'], 404);
        }
    }
    

    public function addApartado(Request $request){
        print_r($request);


        $apartados = Apartados::create($request->all());
        return response($apartados, 201);
    }

    public function updateApartado(Request $request, $id){
        $apartados = Apartados::find($id);
        if(is_null($genere)){
            return response(['message'=>' not found'], 404);
        }else{
            $genere->save($request->all());
            return response($apartados, 200);
        }
    }

    public function deleteApartado($id){
        $apartados = Apartados::find($id);
        if($apartados){
            $apartados->delete();
            return response(['message'=>'deleted'], 200);
        }else{
            return response(['message'=>'not found'], 404);
        }
    }
}
