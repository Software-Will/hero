<?php

use Illuminate\Support\Facades\Route;

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

//Definimos las rutas
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home/{name}', function ($name) { //ruta home en url localhost:8000/home y pasamos una variable nombre
    return view('home', ['name' => $name]); //retornamos una vista con el parametro de name
    //return "Hola " . $name . "! Como estas hoy?"; //laravel lo autoformatea a html
})->where('name', '[A-Za-z]+'); //Expresion regular plus para solo considerar caracteres y no numeros
