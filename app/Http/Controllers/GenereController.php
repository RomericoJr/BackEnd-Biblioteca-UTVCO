<?php

namespace App\Http\Controllers;

use App\Models\Genere;
use Illuminate\Http\Request;

class GenereController extends Controller
{
    public function getGenere(){
        $genere = Genere::all();
        return response($genere, 200);
    }

    public function getGenereById($id){
        $genere = Genere::find($id);
        if($genere){
            return response($genere, 200);
        }else{
            return response(['message'=>'Genere not found']);
        }
    }

    public function addGenere(Request $request){
        $genere = Genere::create($request->all());
        return response($genere, 201);
    }

    public function updateGenere(Request $request, $id){
        $genere = Genere::find($id);
        if(is_null($genere)){
            return response(['message'=>'Genere not found'], 404);
            
        }else{
            $genere->update($request->all());
            return response($genere, 200);
        }
    }

    public function deleteGenere($id){
        $genere = Genere::find($id);
        if($genere){
            $genere->delete();
            return response(['message'=>'Genere deleted'], 200);
        }else{
            return response(['message'=>'Genere not found'], 404);
        }
    }
}
