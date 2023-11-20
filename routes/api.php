<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\StudentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'jwt.auth'], function () {
    // Rutas protegidas por JWT
});


Route::post('Back%%Biblioteca_UTVCO/login', [authController::class, 'login']);
Route::post('Back%%Biblioteca_UTVCO/register', [authController::class, 'register']);
Route::get('Back%%Biblioteca_UTVCO/refresh', [authController::class, 'refresh']);
Route::get('Back%%Biblioteca_UTVCO/logout', [authController::class, 'logout']);
Route::get('Back%%Biblioteca_UTVCO/user-profile', [authController::class, 'userDetails']);


Route::post('Back%%Biblioteca_UTVCO/registerStudent',[StudentsController::class, 'registerStudent']);
Route::get('Back%%Biblioteca_UTVCO/getStudent',[StudentsController::class, 'getStudents']);
Route::get('Back%%Biblioteca_UTVCO/getStudentByMatricula/{matricula}',[StudentsController::class, 'getStudentByMatricula']);
Route::put('Back%%Biblioteca_UTVCO/updateStudent/{email}',[StudentsController::class, 'updateStudent']);
