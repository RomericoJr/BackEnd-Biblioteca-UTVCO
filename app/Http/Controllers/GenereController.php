<?php

namespace App\Http\Controllers;

use App\Models\Genere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenereController extends Controller
{
    public function getGenere(){
        try{
            $genere = Genere::all();
            return response()->json([
                'message' => 'Successful',
                'genere' => $genere
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Failed to query generes',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function getGenereById($id){
        try{
            $genere = Genere::find($id);
            if(is_null($genere)){
                return response()->json([
                    'message' => 'Genere not found',
                ], 404);
            }
            return response()->json([
                'message' => 'Successful',
                'genere' => $genere
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Failed to query genere',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function addGenere(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'genere' => 'required|string|max:50',
            ]);
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(),400);
            }
            $genere = Genere::create([
                'genere' => $request->get('genere'),
            ]);
            return response()->json([
                'message' => 'Genere successfully',
                'genere' => $genere
            ], 201);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Genere failed',
                'error' => $e->getMessage()
            ], 400);
        }

    }

    public function updateGenere(Request $request, $id){
        try{
            $validator = Validator::make($request->all(),[
                'genere' => 'required|string|max:255',
            ]);
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(),400);
            }
            $genere = Genere::find($id);
            $genere->update([
                'genere' => $request->get('genere'),
            ]);
            return response()->json([
                'message' => 'Genere successfully',
                'genere' => $genere
            ], 201);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Genere failed',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function deleteGenere($id){
        try{
            $genere = Genere::find($id);
            if(is_null($genere)){
                return response()->json([
                    'message' => 'Genere not found',
                ], 404);
            }
            $genere->delete();
            return response()->json([
                'message' => 'Genere successfully deleted',
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Genere failed to delete',
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
