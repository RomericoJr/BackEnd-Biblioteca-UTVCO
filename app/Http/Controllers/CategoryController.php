<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    // 1.- Add a new category
    // public function addCategory(Request $request){
    //     $request->validate([
    //         'category'=>'required',
    //     ]);
    //     $category = category::create($request->all());
    //     return response($category, 201);
    // }

    public function addCategory(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),[
                'category' => 'required|string|max:50',
            ]);
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(),400);
            }
            $category = category::create([
                'category' => $request->get('category'),
            ]);
            return response()->json([
                'message' => 'Category successfully',
                'category' => $category
            ], 201);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Category failed',
                'error' => $e->getMessage()
            ], 400);
        }
}

    // 2.- Get a category
    public function getCategory()
    {
        try{
            $category = category::all();
            return response()->json([
                'message' => 'Successful',
                'category' => $category
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Failed to query categories',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    // 3.- Delete a category
    public function deleteCatego($id){
        try{
            $category = category::find($id);
            if(is_null($category)){
                return response()->json(['message' => 'Category Not Found'], 404);
            }
            $category->delete();
            return response()->json(null, 204);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Failed to delete category',
                'error' => $e->getMessage()
            ], 400);
        }

    }

    // 4.- Get id of the category
    public function getCategoId($id){
        try{
            $category = category::find($id);
            if(is_null($category)){
                return response()->json(['message' => 'Category Not Found'], 404);
            }
            return response()->json($category, 200);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Failed to query category',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    // 5.- Update category
    public function updateCatego(Request $request, $id){
        try{
            $category = category::find($id);
            if(is_null($category)){
                return response()->json(['message' => 'Category Not Found'], 404);
            }
            $category->update($request->all());
            return response($category, 200);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Failed to update category',
                'error' => $e->getMessage()
            ], 400);
        }
    }

}
