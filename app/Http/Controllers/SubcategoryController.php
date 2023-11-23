<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subcategory;

class SubcategoryController extends Controller
{
     // 1.- Add a new sub-category
     public function addSubcategory(Request $request){
        $request->validate([
            'subcategory'=>'required',
            'id_category'=>'required|'
        ]);
        $subcategory = subcategory::create($request->all());
        return response($subcategory, 201);
    }

    // 2.- Get a sub-category
    public function getSubcategory()
    {
        return response()->json(subcategory::all(), 200);
    }

    // 3.- Delete a sub-category
    public function deleteSubcatego($id){
        $subcategory = subcategory::find($id);
        if(is_null($subcategory)){
            return response()->json(['message'=> 'Subcategory Not Found'], 404);
        }
        $subcategory->delete();
        return response()->json(['message'=>'Subcategory Deleted',null], 204);
    }

    // 4.- Get id of the sub-category
    public function getSubcategoId($id){
        $subcategory = subcategory::find($id);
        if(is_null($subcategory)){
            return response()->json(['message' => 'Subcategory Not Found'], 404);
        }
        return response()->json($subcategory::find($id), 200);
    }

    // 5.- Update sub-category
    public function updateSubcatego(Request $request, $id){
        $subcategory = subcategory::find($id);
        if(is_null($subcategory)){
            return response()->json(['message' => 'Subcategory Not Found'], 404);
        }
        $subcategory->update($request->all());
        return response($subcategory, 200);
    }
}
