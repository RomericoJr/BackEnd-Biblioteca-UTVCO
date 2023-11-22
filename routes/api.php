<?php


use App\Http\Controllers\GenereController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SetAsaideController;
use App\Http\Controllers\EstadiasController;
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

//Controlador de libros
//Funcion de libros
Route::get('books',[BookController::class, 'getBooks']);
//Funcion libro por id
Route::get('book/{id}',[BookController::class, 'getBookById']);
//Funcion de agregar libro
Route::post('addBook',[BookController::class, 'addBook']);
//Funcion de editar libro
Route::put('editBook/{id}',[BookController::class, 'updateBook']);
//Funcion de eliminar libro
Route::delete('delBook/{id}',[BookController::class, 'deleteBook']);



//Controlador de Genero
//Funcion de generos
Route::get('genere',[GenereController::class, 'getGenere']);
//Funcion de genero por id
Route::get('genere/{id}',[GenereController::class, 'getGenereById']);
//Funcion de agregar genero
Route::post('addGenere',[GenereController::class, 'addGenere']);
//Funcion de editar genero
Route::put('editGenere/{id}',[GenereController::class, 'updateGenere']);
//Funcion de eliminar genero
Route::delete('delGenere/{id}',[GenereController::class, 'deleteGenere']);



//Controlador de Apartados
//Funcion de apartados
Route::get('apartados',[SetAsaideController::class, 'getApartados']);
//Funcion de apartados por id
Route::get('apartado/{id}',[SetAsaideController::class, 'getApartadoById']);
//Funcion de agregar apartados
Route::post('addApartado',[SetAsaideController::class, 'addApartado']);
//Funcion de editar apartados
Route::put('editApartado/{id}',[SetAsaideController::class, 'updateApartado']);
//Funcion de eliminar apartado
Route::delete('delApartado/{id}',[SetAsaideController::class, 'deleteAsaide']);



Route::get('donaciones',[EstadiasController::class, 'getEstadias']);
Route::get('donacion/{id}',[EstadiasController::class, 'getEstadiasById']);
Route::post('newDonacion',[EstadiasController::class, 'addEstadia']);
Route::put('editDonacion/{id}',[EstadiasController::class, 'updateEstadia']);
Route::delete('delDonacion/{id}',[EstadiasController::class, 'deleteEstadia']);