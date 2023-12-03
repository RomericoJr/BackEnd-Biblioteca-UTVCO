<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\lendbook;
use App\Models\set_asaide;
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

    // public function returnBook($id){
    //     try{
    //         $rechazado = '1';
    //         $Aprobado = '2';
    //         $pendiente = '3';
    //         $Devuelto = '4';

    //         $lendbook = lendbook::find($id);

    //         if(!$lendbook){
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'No se encontro el prestamo'
    //             ], 404);
    //         }

    //         $book = Book::find($lendbook->id_book);

    //         if(!$book){
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'No se encontro el libro'
    //             ], 404);
    //         }

    //         $set_asaide = set_asaide::find($lendbook->id_book);

    //         if(!$set_asaide){
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'No se encontro el apartado'
    //             ], 404);
    //         }

    //         $lendbook->update([
    //             'return_date' => now()->toDateString(),
    //             'id_status' => $Devuelto
    //         ]);

    //         $book->update([
    //             'stock' => $book->stock + 1,
    //         ]);

    //         $set_asaide->update([
    //             'id_status' => $Devuelto
    //         ]);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Libro devuelto correctamente',
    //             'data' => [
    //                 'lendBook' => $lendbook,
    //                 'book' => $book
    //                 ]
    //         ], 200);

    //     } catch (\Exception $e){
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Error al devolver el libro',
    //             'errors' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    //Funciona pero solo los primero libros
    // public function returnBook($id)
    // {
    //     try {
    //         $devuelto = '4';

    //         $lendbook = LendBook::find($id);

    //         if (!$lendbook) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'No se encontró el préstamo',
    //             ], 404);
    //         }

    //         // Verificar si el libro ya ha sido devuelto
    //         if ($lendbook->id_status == $devuelto) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'El libro ya ha sido devuelto previamente',
    //             ], 400);
    //         }

    //         $book = Book::find($lendbook->id_book);

    //         if (!$book) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'No se encontró el libro',
    //             ], 404);
    //         }

    //         $set_asaide = set_asaide::find($lendbook->id_book);

    //         if (!$set_asaide) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'No se encontró el apartado',
    //             ], 404);
    //         }

    //         $lendbook->update([
    //             'return_date' => now()->toDateString(),
    //             'id_status' => $devuelto,
    //         ]);

    //         // Incrementar el stock solo si el libro no ha sido devuelto previamente
    //         if ($lendbook->wasChanged('id_status')) {
    //             $book->update([
    //                 'stock' => $book->stock + 1,
    //             ]);
    //         }

    //         $set_asaide->update([
    //             'id_status' => $devuelto,
    //         ]);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Libro devuelto correctamente',
    //             'data' => [
    //                 'lendBook' => $lendbook,
    //                 'book' => $book,
    //             ],
    //         ], 200);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Error al devolver el libro',
    //             'errors' => $e->getMessage(),
    //         ], 500);
    //     }
    // }


    public function returnBook($id)
{
    try {
        $rechazado = '1';
        $Aprobado = '2';
        $pendiente = '3';
        $devuelto = '4';

        $apartado_data = set_asaide::find($id);

        if (!$apartado_data) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró el préstamo',
            ], 404);
        }

        $id_status = $apartado_data->id_status;
        $id_book = $apartado_data->id_book;
        $id_student = $apartado_data->id_student;
        $id_lendBook = $apartado_data->id;

        if( $Aprobado != $id_status){
            return response()->json([
                'success' => false,
                'message' => 'No ere candidato para devolver el libro',
            ], 400);
        }

        if($Aprobado == $id_status){
            $book = Book::find($id_book);

            if (!$book) {
                return response()->json([
                    'success' => false,
                    'message' => 'No se encontró el libro',
                ], 404);
            }

            $lendbook = lendbook::find($id_lendBook);

            if (!$lendbook) {
                return response()->json([
                    'success' => false,
                    'message' => 'No se encontró el prestamo',
                ], 404);
            }

            $lendbook->update([
                'return_date' => now()->toDateString(),
                'id_status' => $devuelto,
            ]);

            if ($lendbook->wasChanged('id_status')) {
                $book->update([
                    'stock' => $book->stock + 1,
                ]);
            }

            $apartado_data->update([
                'id_status' => $devuelto,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Libro que puede devolver correctamente',
                'data' => [
                    'lendBook' => $lendbook,
                    'book' => $book,
                    'set_asaide' => $apartado_data,
                ],
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'No ere candidato para devolver el libro',
        ], 400);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error al devolver el libro',
            'errors' => $e->getMessage(),
        ], 500);
    }
}


}
