<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\lendbook;
use Illuminate\Http\Request;

class LendbookController extends Controller
{
    public function getLendbooks(){
        try{
            $lendbooks = lendbook::with('book','student')->get();

            if(!$lendbooks){
                return response()->json([
                    'success' => false,
                    'message' => 'No se encontro el prestamo'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Prestamos obtenidos correctamente',
                'data' => $lendbooks
            ], 200);

        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los prestamos',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function returnBook($id){
        try{
            $rechazado = 0;
            $Aprobado = 1;
            $Pendiente = 2;
            $Devuelto = 3;

            $lendbook = lendbook::find($id);

            if(!$lendbook){
                return response()->json([
                    'success' => false,
                    'message' => 'No se encontro el prestamo'
                ], 404);
            }

            $book = Book::find($lendbook->id_book);

            if(!$book){
                return response()->json([
                    'success' => false,
                    'message' => 'No se encontro el libro'
                ], 404);
            }

            $lendbook->update([
                'return_date' => now()->toDateString(),
                'status' => $Devuelto
            ]);

            $book->update([
                'stock' => $book->stock + 1,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Libro devuelto correctamente',
                'data' => [
                    'lendBook' => $lendbook,
                    'book' => $book
                    ]
            ], 200);

        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al devolver el libro',
                'errors' => $e->getMessage()
            ], 500);
        }
    }
}
