<?php

namespace App\Http\Controllers;

use App\Models\Estadias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstadiasController extends Controller
{
    public function getEstadias(){
        try{
            $estadias = Estadias::all();

            if(!$estadias){
                return response()->json([
                    'success' => false,
                    'message' => 'No se encontro la estadia'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Estadias obtenidas correctamente',
                'data' => $estadias
            ], 200);

        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener las estadias',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function getEstadiaById($id){
        try{
            $estadia = Estadias::find($id);

            if(!$estadia){
                return response()->json([
                    'success' => false,
                    'message' => 'No se encontro la estadia'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Estadia obtenida correctamente',
                'data' => $estadia
            ], 200);

        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la estadia',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function addEstadia(Request $request){
        try{
            $validate = Validator::make($request->all(),[
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'copias' => 'required|integer',
            ]);
            if($validate->fails()){
                return response()->json($validate->errors()->toJson(),400);
            }

            $estadia = Estadias::create([
                'title' => $request->get('title'),
                'author' => $request->get('author'),
                'description' => $request->get('description'),
                'copias' => $request->get('copias'),
            ]);

            return response()->json([
                'message' => 'Estadia successfully',
                'data' => $estadia
            ], 201);
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la estadia',
                'errors' => $e->getMessage()
            ], 400);
        }
    }

    public function updateEstadia(Request $request, $id){
        try{
            $estadia = Estadias::find($id);

            if(!$estadia){
                return response()->json([
                    'success' => false,
                    'message' => 'No se encontro la estadia',
                    'errors' => null
                ], 404);
            }

            $rules = [
                'title' => 'string|max:255',
                'author' => 'string|max:255',
                'description' => 'string|max:255',
                'copias' => 'integer',
            ];

            $validate = Validator::make($request->all(), $rules);

            if($validate->fails()){
                return response()->json($validate->errors()->toJson(),400);
            }

            $estadia->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Estadia actualizada correctamente',
                'data' => $estadia
            ], 200);

        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la estadia',
                'errors' => $e->getMessage()
            ], 400);
        }
    }

    public function deleteEstadia($id){
        try{
            $estadia = Estadias::find($id);

            if(!$estadia){
                return response()->json([
                    'success' => false,
                    'message' => 'No se encontro la estadia',
                    'errors' => null
                ], 404);
            }

            $estadia->delete();

            return response()->json([
                'success' => true,
                'message' => 'Estadia eliminada correctamente',
                'data' => $estadia
            ], 200);

        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la estadia',
                'errors' => $e->getMessage()
            ], 400);
        }
    }
}
