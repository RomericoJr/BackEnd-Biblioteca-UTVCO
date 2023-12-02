<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
     public function getBooks(){
        // $book = Book::all();
        // $book = Book::with('category', 'subcategory')->get();
        try{
            $book = Book::with('category', 'subcategory')->get();
            if($book){
                return response($book, 200);
            }else{
                return response(['message'=>'Books not found']);
            }
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los libros',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function getBookById($id){
        try{
            $book = Book::with('category', 'subcategory')->find($id);
            if($book){
                return response($book, 200);
            }else{
                return response(['message'=>'Book not found']);
            }
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el libro',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function addBook(Request $request){
        try{
            $validate = Validator::make($request->all(),[
                'isbn' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'editorial' => 'required|string|max:255',
                'edition' => 'required|string|max:255',
                'stock' => 'required|integer',
                'id_category' => 'required|integer',
                'id_subcategory' => 'required|integer'
            ]);

            if($validate->fails()){
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validacion de datos',
                    'errors' => $validate->errors()
                ], 422);
            }

            $newBook = Book::create([
                'isbn' => $request->get('isbn'),
                'title' => $request->get('title'),
                'author' => $request->get('author'),
                'editorial' => $request->get('editorial'),
                'edition' => $request->get('edition'),
                'stock' => $request->get('stock'),
                'id_category' => $request->get('id_category'),
                'id_subcategory' => $request->get('id_subcategory')
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Libro registrado correctamente',
                'data' => $newBook
            ], 201);
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al registrar el libro',
                'errors' => $e->getMessage()
            ], 400);
        }
    }

    public function updateBook(Request $request, $id){
        try{
            $book = Book::find($id);
            if(!$book){
                return response()->json([
                    'success' => false,
                    'message' => 'No se encontro el libro'
                ], 404);
            }

            $validate = Validator::make($request->all(),[
                'isbn' => 'string|max:255',
                'title' => 'string|max:255',
                'author' => 'string|max:255',
                'editorial' => 'string|max:255',
                'edition' => 'string|max:255',
                'stock' => 'integer',
                'id_category' => 'integer',
                'id_subcategory' => 'integer'
            ]);

            if($validate->fails()){
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validacion de datos',
                    'errors' => $validate->errors()
                ], 422);
            }

            $book->update([
                'isbn' => $request->get('isbn'),
                'title' => $request->get('title'),
                'author' => $request->get('author'),
                'editorial' => $request->get('editorial'),
                'edition' => $request->get('edition'),
                'stock' => $request->get('stock'),
                'id_category' => $request->get('id_category'),
                'id_subcategory' => $request->get('id_subcategory')
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Libro actualizado correctamente',
                'data' => $book
            ], 200);
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el libro',
                'errors' => $e->getMessage()
            ], 400);
        }
    }

    public function deleteBook($id){
        try{
            $book = Book::find($id);
            if(!$book){
                return response()->json([
                    'success' => false,
                    'message' => 'No se encontro el libro'
                ], 404);
            }

            $book->delete();

            return response()->json([
                'success' => true,
                'message' => 'Libro eliminado correctamente',
                'data' => $book
            ], 200);
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el libro',
                'errors' => $e->getMessage()
            ], 400);
        }
    }

}
