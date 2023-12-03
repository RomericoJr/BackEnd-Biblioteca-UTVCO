<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\lendbook;
use App\Models\Set_asaide as Apartados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SetAsaideController extends Controller
{
    public function getApartados(){
        try{
            $apartados = Apartados::with('book','student','status')->get();
            if($apartados){
                return response($apartados, 200);
            }else{
                return response(['message'=>'not found'], 404);
            }
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los apartados',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function getApartadoByIdStudent($id){
        try{
            $apartados = Apartados::where('id_student', $id)
            ->addSelect([
                'book_name' => Book::select('title')
                ->whereColumn('id_book', 'id')
                ])
            ->get();
            if($apartados){
                return response($apartados, 200);
            }else{
                return response(['message'=>'not found'], 404);
            }
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los apartados',
                'errors' => $e->getMessage()
            ], 500);
        }
    }


    // public function addApartado(Request $request){
    //     try{
    //             $validator = Validator::make($request->all(),[
    //                 'id_book' => 'required|integer',
    //                 'id_student' => 'required|integer',
    //                 'date_set_asaide' => 'required|date',
    //                 // 'id_status' => 'required|string|max:255',
    //             ]);
    //             if($validator->fails()){
    //                 return response()->json($validator->errors()->toJson(),400);
    //             }
    //             $apartado = Apartados::create([
    //                 'id_book' => $request->get('id_book'),
    //                 'id_student' => $request->get('id_student'),
    //                 'date_set_asaide' => $request->get('date_set_asaide'),
    //                 // 'id_status' => $request->get('status'),
    //             ]);
    //             return response()->json([
    //                 'message' => 'Apartado successfully',
    //                 'apartado' => $apartado
    //             ], 201);

    //     } catch (\Exception $e){
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Error al registrar el apartado',
    //             'errors' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    // public function addApartado(Request $request){
    //     try{
    //         $validator = Validator::make($request->all(), [
    //             'id_book' => 'required|integer',
    //             'id_student' => 'required|integer',
    //             'date_set_asaide' => 'required|date',
    //         ]);

    //         if($validator->fails()){
    //             return response()->json($validator->errors()->toJson(), 400);
    //         }

    //         // Verificar si ya existe un apartado para el libro y el usuario
    //         $existingApartado = Apartados::where('id_student', $request->get('id_student'))
    //             ->where('id_book', $request->get('id_book'))
    //             ->first();

    //         if($existingApartado){
    //             return response()->json([
    //                 'message' => 'El usuario ya tiene un apartado pendiente para este libro',
    //             ], 400);
    //         }

    //         $apartado = Apartados::create([
    //             'id_book' => $request->get('id_book'),
    //             'id_student' => $request->get('id_student'),
    //             'date_set_asaide' => $request->get('date_set_asaide'),
    //         ]);

    //         return response()->json([
    //             'message' => 'Apartado successfully',
    //             'apartado' => $apartado
    //         ], 201);

    //     } catch (\Exception $e){
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Error al registrar el apartado',
    //             'errors' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    public function addApartado(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'id_book' => 'required|integer',
                'id_student' => 'required|integer',
                'date_set_asaide' => 'required|date',
            ]);

            if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }

            $existingLend = Apartados::where('id_student', $request->get('id_student'))
            ->where('id_book', $request->get('id_book'))
            ->whereIn('id_status', [2, 3])
            ->first();

            if($existingLend){
                return response()->json([
                    'message' => 'El usuario tiene un libro pero no lo ha devuelto asi que no se lo prestamos',
                ], 400);
            }

            $existingApartado = Apartados::where('id_student', $request->get('id_student'))
                ->where('id_book', $request->get('id_book'))
                ->first();

            $status = $existingApartado ? $existingApartado->id_status : null;

            if ($status != '3') {
                $apartado = Apartados::create([
                    'id_book' => $request->get('id_book'),
                    'id_student' => $request->get('id_student'),
                    'date_set_asaide' => $request->get('date_set_asaide'),
                ]);

                return response()->json([
                    'message' => 'Apartado successfully',
                    'apartado' => $apartado
                ], 201);
            } else {
                return response()->json([
                    'message' => 'El usuario no puede requerir el mismo libro',
                ], 400);
            }

        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al registrar el apartado',
                'errors' => $e->getMessage()
            ], 500);
        }
    }




    public function updateStatus(Request $request, $id){
        try{
            $rechazado = '1';
            $Aprobado = '2';
            $pendiente = '3';
            $devuelto = '4';

            if($request->get('id_status') == $Aprobado){
                $apartado = Apartados::find($id);

                if(!$apartado){
                    return response()->json([
                        'message' => 'Apartado not found',
                    ], 404);
                }

                $book = Book::find($apartado->id_book);

                if(!$book){
                    return response()->json([
                        'message' => 'Book not found',
                    ], 404);
                }

                $newLendBook = lendbook::create([
                    'id_book' => $apartado->id_book,
                    'id_student' => $apartado->id_student,
                    'lend_date' => now()->toDateString(),
                    'id_set_asaide' => $apartado->id,
                    'id_status' => $Aprobado,
                ]);

                $status = $request->get('id_status');
                // $apartado->status = $request->get('status');

                $apartado->update([
                    'id_status' => $status,
                ]);

                $book->update([
                    'stock' => $book->stock - 1,
                ]);

                return response()->json([
                    'message' => 'Aprobado successfully',
                    'data' => [
                        'NewLend' => $newLendBook,
                        'setAsaide' => $apartado,
                        'book' => $book
                        ]
                ], 201);
            }else if($request->get('id_status') == $rechazado){
                $apartado = Apartados::find($id);

                if(!$apartado){
                    return response()->json([
                        'message' => 'Apartado not found',
                    ], 404);
                }

                $status = $request->get('id_status');

                $apartado->update([
                    'id_status' => $status,
                ]);

                return response()->json([
                    'message' => 'Rechazado successfully',
                    'apartado' => $apartado
                ], 201);
            }

        }
        catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al registrar el apartado',
                'errors' => $e->getMessage()
            ], 500);
        }
    }





    public function updateApartadoStatus(Request $request, $id){
        try{
            if($request->get('status') == 2){
                $apartado = Apartados::find($id);
                $apartado->status = $request->get('status');
                $apartado->save();
                return response()->json([
                    'message' => 'Apartado successfully',
                    'apartado' => $apartado
                ], 201);
        }
    } catch (\Exception $e){
        return response()->json([
            'success' => false,
            'message' => 'Error al registrar el apartado',
            'errors' => $e->getMessage()
        ], 500);
    }

    }

    public function deleteApartado($id){
        $apartados = Apartados::find($id);
        if($apartados){
            $apartados->delete();
            return response(['message'=>'deleted'], 200);
        }else{
            return response(['message'=>'not found'], 404);
        }
    }
}
