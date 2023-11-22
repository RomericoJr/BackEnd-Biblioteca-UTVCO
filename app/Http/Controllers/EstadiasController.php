<?php

namespace App\Http\Controllers;

use App\Models\Estadias;
use Illuminate\Http\Request;

class EstadiasController extends Controller
{
    public function getEstadias(){
        $estadias = Estadias::all();
        return response($estadias, 200);
    }

    public function getEstadiaById($id){
        $estadia = Estadias::find($id);
        if($estadia){
            return response($estadia, 200);
        }else{
            return response(['message'=>'Estadia not found']);
        }
    }

    public function addEstadia(Request $request){
        $estadia = Estadias::create($request->all());
        return response($estadia, 201);
    }

    public function updateEstadia(Request $request, $id){
        $estadia = Estadias::find($id);
        if(is_null($estadia)){
            return response(['message'=>'Book not found'], 404);
        }else{
            $estadia->update($request->all());
            return response($estadia, 200);
        }
    }

    public function deleteEstadia($id){
        $estadia = Estadias::find($id);
        if($estadia){
            $estadia->delete();
            return response(['message'=>'Book deleted'], 200);
        }else{
            return response(['message'=>'Book not found'], 404);
        }
    }
}
