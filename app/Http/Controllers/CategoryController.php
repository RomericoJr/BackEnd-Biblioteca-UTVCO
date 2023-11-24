<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

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
            $request->validate([
                'category'=>'required',
            ]);
            $category = category::create($request->all());
            return response($category, 201);
        } catch (Exception $exception){
        Log::error($exception->getMessage());

            return redirect()->back()->withErrors("No se ha podido crear categoria.");
    }}

    // 2.- Get a category
    public function getCategory()
    {
        return response()->json(category::all(), 200);
    }

    // 3.- Delete a category
    public function deleteCatego($id){
        $category = category::find($id);
        if(is_null($category)){
            return response()->json(['message'=> 'Category Not Found'], 404);
        }
        $category->delete();
        return response()->json(['message'=>'Category Deleted',null], 204);
    }

    // 4.- Get id of the category
    public function getCategoId($id){
        $category = category::find($id);
        if(is_null($category)){
            return response()->json(['message' => 'Category Not Found'], 404);
        }
        return response()->json($category::find($id), 200);
    }

    // 5.- Update category
    public function updateCatego(Request $request, $id){
        $category = category::find($id);
        if(is_null($category)){
            return response()->json(['message' => 'Category Not Found'], 404);
        }
        $category->update($request->all());
        return response($category, 200);
    }

}
