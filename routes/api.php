<?php



use App\Http\Controllers\GenereController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SetAsaideController;
use App\Http\Controllers\EstadiasController;

use App\Http\Controllers\authController;
use App\Http\Controllers\StudentsController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;

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
Route::get('Back%%Biblioteca_UTVCO/books',[BookController::class, 'getBooks']);
//Funcion libro por id
Route::get('Back%%Biblioteca_UTVCO/book/{id}',[BookController::class, 'getBookById']);
//Funcion de agregar libro
Route::post('Back%%Biblioteca_UTVCO/addBook',[BookController::class, 'addBook']);
//Funcion de editar libro
Route::put('Back%%Biblioteca_UTVCO/editBook/{id}',[BookController::class, 'updateBook']);
//Funcion de eliminar libro
Route::delete('Back%%Biblioteca_UTVCO/delBook/{id}',[BookController::class, 'deleteBook']);



//Controlador de Genero
//Funcion de generos
Route::get('Back%%Biblioteca_UTVCO/genere',[GenereController::class, 'getGenere']);
//Funcion de genero por id
Route::get('Back%%Biblioteca_UTVCO/genere/{id}',[GenereController::class, 'getGenereById']);
//Funcion de agregar genero
Route::post('Back%%Biblioteca_UTVCO/addGenere',[GenereController::class, 'addGenere']);
//Funcion de editar genero
Route::put('Back%%Biblioteca_UTVCO/editGenere/{id}',[GenereController::class, 'updateGenere']);
//Funcion de eliminar genero
Route::delete('Back%%Biblioteca_UTVCO/delGenere/{id}',[GenereController::class, 'deleteGenere']);



//Controlador de Apartados
//Funcion de apartados
Route::get('Back%%Biblioteca_UTVCO/apartados',[SetAsaideController::class, 'getApartados']);
//Funcion de apartados por id
Route::get('Back%%Biblioteca_UTVCO/apartado/{id}',[SetAsaideController::class, 'getApartadoById']);
//Funcion de agregar apartados
Route::post('Back%%Biblioteca_UTVCO/addApartado',[SetAsaideController::class, 'addApartado']);
//Funcion de editar apartados
Route::put('Back%%Biblioteca_UTVCO/editApartado/{id}',[SetAsaideController::class, 'updateApartado']);
//Funcion de eliminar apartado
Route::delete('Back%%Biblioteca_UTVCO/delApartado/{id}',[SetAsaideController::class, 'deleteAsaide']);



//Controlador de Donaciones de estadias
//Funcion de donaciones
Route::get('Back%%Biblioteca_UTVCO/donaciones',[EstadiasController::class, 'getEstadias']);
//Funcion de donacion por id
Route::get('Back%%Biblioteca_UTVCO/donacion/{id}',[EstadiasController::class, 'getEstadiasById']);
//Funcion de agregar donacion
Route::post('Back%%Biblioteca_UTVCO/newDonacion',[EstadiasController::class, 'addEstadia']);
//Funcion de editar donacion
Route::put('Back%%Biblioteca_UTVCO/editDonacion/{id}',[EstadiasController::class, 'updateEstadia']);
//Funcion de eliminar donacion
Route::delete('Back%%Biblioteca_UTVCO/delDonacion/{id}',[EstadiasController::class, 'deleteEstadia']);


Route::post('Back%%Biblioteca_UTVCO/login', [authController::class, 'login']);
Route::post('Back%%Biblioteca_UTVCO/register', [authController::class, 'register']);
Route::get('Back%%Biblioteca_UTVCO/refresh', [authController::class, 'refresh']);
Route::get('Back%%Biblioteca_UTVCO/logout', [authController::class, 'logout']);
Route::get('Back%%Biblioteca_UTVCO/user-profile', [authController::class, 'userDetails']);


Route::post('Back%%Biblioteca_UTVCO/registerStudent',[StudentsController::class, 'registerStudent']);
Route::get('Back%%Biblioteca_UTVCO/getStudent',[StudentsController::class, 'getStudents']);
Route::get('Back%%Biblioteca_UTVCO/getStudentByMatricula/{matricula}',[StudentsController::class, 'getStudentByMatricula']);
Route::put('Back%%Biblioteca_UTVCO/updateStudent/{email}',[StudentsController::class, 'updateStudent']);


//Rutas de Categorias
// add categories
Route::post('Back%%Biblioteca_UTVCO/addCategoria', [CategoryController::class, 'addCategory']);
// get categories
Route::get('Back%%Biblioteca_UTVCO/categoria', [CategoryController::class, 'getCategory']);
// delete categories
Route::delete('Back%%Biblioteca_UTVCO/deleteCategoria/{id}', [CategoryController::class, 'deleteCatego']);
// get by id categories
Route::get('Back%%Biblioteca_UTVCO/categoria/{id}', [CategoryController::class, 'getCategoId']);
// update categories
Route::put('Back%%Biblioteca_UTVCO/updateCategoria/{id}', [CategoryController::class, 'updateCatego']);

//Rutas de Subcategorias
// add sub-categories
Route::post('Back%%Biblioteca_UTVCO/addSubcategoria', [SubcategoryController::class, 'addSubcategory']);
// get sub-categories
Route::get('Back%%Biblioteca_UTVCO/subcategoria', [SubcategoryController::class, 'getSubcategory']);
// delete sub-categories
Route::delete('Back%%Biblioteca_UTVCO/deleteSubategoria/{id}', [SubcategoryController::class, 'deleteSubcatego']);
// get by id sub-categories
Route::get('Back%%Biblioteca_UTVCO/subcategoria/{id}', [SubcategoryController::class, 'getSubcategoId']);
// update sub-categories
Route::put('Back%%Biblioteca_UTVCO/updateSubcategoria/{id}', [SubcategoryController::class, 'updateSubcatego']);

