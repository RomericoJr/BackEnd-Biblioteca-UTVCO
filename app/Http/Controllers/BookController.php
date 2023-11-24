<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getBooks(){
        $book = Book::all();
        return response($book, 200);
    }

    public function getBookById($id){
        $book = Book::find($id);
        if($book){
            return response($book, 200);
        }else{
            return response(['message'=>'Book not found']);
        }
    }

    public function addBook(Request $request){
        $book = Book::create($request->all());
        return response($book, 201);
    }

    public function updateBook(Request $request, $id){
        $book = Book::find($id);
        if(is_null($book)){
            return response(['message'=>'Book not found'], 404);
        }else{
            $book->update($request->all());
            return response($book, 200);
        }
    }

    public function deleteBook($id){
        $book = Book::find($id);
        if($book){
            $book->delete();
            return response(['message'=>'Book deleted'], 200);
        }else{
            return response(['message'=>'Book not found'], 404);
        }
    }
    
}
