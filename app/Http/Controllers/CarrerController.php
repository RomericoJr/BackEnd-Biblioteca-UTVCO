<?php

namespace App\Http\Controllers;

use App\Models\carrer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarrerController extends Controller
{
    public function addCarrer(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'carrer_name' => 'required|string|max:255',
            ]);
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(),400);
            }
            $carrer = carrer::create([
                'carrer_name' => $request->get('carrer_name'),
            ]);
            return response()->json([
                'message' => 'Carrer successfully',
                'carrer' => $carrer
            ], 201);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Carrer failed',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function getCarrer()
    {
        try{
            $carrer = carrer::all();
            return response()->json([
                'message' => 'Successful',
                'carrer' => $carrer
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Failed to query carrers',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function updateCarrer(Request $request, $id)
    {
        try{
            $validator = Validator::make($request->all(),[
                'carrer_name' => 'required|string|max:255',
            ]);
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(),400);
            }
            $carrer = carrer::find($id);
            $carrer->update([
                'carrer_name' => $request->get('carrer_name'),
            ]);
            return response()->json([
                'message' => 'Carrer successfully',
                'carrer' => $carrer
            ], 201);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Carrer failed',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function deleteCarrer($id){
        try{
            $carrer = carrer::find($id);
            $carrer->delete();
            return response()->json([
                'message' => 'Carrer successfully',
                'carrer' => $carrer
            ], 201);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Carrer failed',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function getCarrerById($id){
        try{
            $carrer = carrer::find($id);
            return response()->json([
                'message' => 'Carrer successfully',
                'carrer' => $carrer
            ], 201);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Carrer failed',
                'error' => $e->getMessage()
            ], 400);
        }
    }


}
