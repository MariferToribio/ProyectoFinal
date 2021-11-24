<?php

use Illuminate\Support\Facades\Route;
use App\Models\Libro;
use App\Http\Controllers\LibroController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/libros/carrito', [LibroController::class, 'carrito'])->name('libros.carrito');

Route::resource('autores', 'App\Http\Controllers\AutorController');
Route::resource('editoriales', 'App\Http\Controllers\EditorialController');
Route::resource('libros', 'App\Http\Controllers\LibroController');
Route::resource('principal', 'App\Http\Controllers\PrincipalController');

Route::middleware(['auth:sanctum', 'verified'])->get('/principal', function () {
    $libros = Libro::all(); 
    return view('principal.librosPrincipal')->with('libros', $libros);
})->name('principal');


