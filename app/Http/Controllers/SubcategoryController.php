<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\subcategory;
use Illuminate\Support\Facades\Validator;

class SubcategoryController extends Controller
{
     // 1.- Add a new sub-category
    public function addSubcategory(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'subcategory' => 'required|string|max:255',
                'id_category' => 'required',
            ]);
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(),400);
            }
            $subcategory = subcategory::create([
                'subcategory' => $request->get('subcategory'),
                'id_category' => $request->get('id_category'),
            ]);
            return response()->json([
                'message' => 'Subcategory successfully',
                'subcategory' => $subcategory
            ], 201);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Subcategory failed',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    // 2.- Get a sub-category
    public function getSubcategory()
    {
        try{
            $subcategory = subcategory::with('category')->get();

            return response()->json([
                'message' => 'Successful',
                'subcategory' => $subcategory
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Failed to query subcategories',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    // 3.- Delete a sub-category
    public function deleteSubcatego($id){
        try{
            $subcategory = subcategory::find($id);
            if(is_null($subcategory)){
                return response()->json(['message' => 'Subcategory Not Found'], 404);
            }
            $subcategory->delete();
            return response()->json(['message' => 'Subcategory Deleted Successfully'], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Failed to delete subcategory',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    // 4.- Get id of the sub-category
    public function getSubcategoId($id){
        try{
            $subcategory = subcategory::find($id);
            if(is_null($subcategory)){
                return response()->json(['message' => 'Subcategory Not Found'], 404);
            }
            return response()->json($subcategory, 200);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Failed to query subcategory',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    // 5.- Update sub-category
    public function updateSubcatego(Request $request, $id){

        try{
            $validator = Validator::make($request->all(),[
                'subcategory' => 'required|string|max:255',
                'id_category' => 'required',
            ]);
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(),400);
            }
            $subcategory = subcategory::find($id);
            if(is_null($subcategory)){
                return response()->json(['message' => 'Subcategory Not Found'], 404);
            }
            $subcategory->update([
                'subcategory' => $request->get('subcategory'),
                'id_category' => $request->get('id_category'),
            ]);
            return response()->json([
                'message' => 'Subcategory successfully',
                'subcategory' => $subcategory
            ], 201);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Subcategory failed',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function getSubcategoryByCategory($id){
        try{
            $subcategory = subcategory::where('id_category', $id)->get();
            if(is_null($subcategory)){
                return response()->json(['message' => 'Subcategory Not Found'], 404);
            }
            return response()->json($subcategory, 200);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Failed to query subcategory',
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
