<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    public function registerStudent(Request $request){
        try{
            $validate = Validator::make($request->all(),[
                'name' => 'required|string|max:255',
                'lastname_father' => 'required|string|max:255',
                'lastname_mother' => 'required|string|max:255',
                'matricula' => 'required|string|max:255|unique:students',
                'phone' => 'required|string|max:255|unique:students',
                'email' => 'required|string|email|max:255|unique:students',
                'password'=> 'required|string|min:6',
                'id_genere' => 'required|integer',
            ]);

            if($validate->fails()){
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validacion de datos',
                    'errors' => $validate->errors()
                ], 422);
            }

            $newStudent = students::create([
                'name' => $request->get('name'),
                'lastname_father' => $request->get('lastname_father'),
                'lastname_mother' => $request->get('lastname_mother'),
                'matricula' => $request->get('matricula'),
                'phone' => $request->get('phone'),
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'id_genere' => $request->get('id_genere'),
            ]);

            $newUser = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'id_rol' => 2,
                'id_students' => $newStudent->id,
                'password' => bcrypt($request->get('password')),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Estudiante registrado correctamente',
                'data' => $newStudent
            ], 201);
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al registrar al estudiante',
                'errors' => $e->getMessage()
            ], 400);
        }
    }

    public function getStudents(){
        try{
            $students = students::all();
            return response()->json([
                'success' => true,
                'message' => 'Estudiantes obtenidos correctamente',
                'data' => $students
            ], 200);
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los estudiantes',
                'errors' => $e->getMessage()
            ], 400);
        }
    }

    public function getStudentByMatricula($matricula){
        try{
            $student = students::where('matricula', $matricula)->first();
            return response()->json([
                'success' => true,
                'message' => 'Estudiante obtenido correctamente',
                'data' => $student
            ], 200);
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el estudiante',
                'errors' => $e->getMessage()
            ], 400);
        }
    }

    public function updateStudent(Request $request, $email){
        try{
            $student = students::where('email', $email)->first();
            $studentUser = User::where('email', $email)->first();

            if(!$student){
                return response()->json([
                    'success' => false,
                    'message' => 'No se encontro el estudiante',
                    'errors' => null
                ], 404);
            }

            $rules = [
                'name' => 'string|max:255',
                'lastname_father' => 'string|max:255',
                'lastname_mother' => 'string|max:255',
                'matricula' => 'string|max:255',
                'phone' => 'string|max:255',
                'email' => 'string|email|max:255',
                'password'=> 'string|min:6',
                'id_genere' => 'integer',
            ];

            $request->validate($rules);

            $student->update($request->only([
                'name',
                'lastname_father',
                'lastname_mother',
                'matricula',
                'phone',
                'email',
                'password',
                'id_genere'
            ]));

            $studentUser->update($request->only([
                'name',
                'email',
                'password',
            ]));

            // $student->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Estudiante actualizado correctamente',
                'data' => $student,
                'dataUser' => $studentUser
            ], 200);
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el estudiante',
                'errors' => $e->getMessage()
            ], 400);
        }
    }




}
