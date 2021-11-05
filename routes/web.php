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

//Route::get('/home/{name}', function ($name) { //ruta home en url localhost:8000/home y pasamos una variable nombre
//  return view('home', ['name' => $name]); //retornamos una vista con el parametro de name
//return "Hola " . $name . "! Como estas hoy?"; //laravel lo autoformatea a html
//})->where('name', '[A-Za-z]+'); //Expresion regular plus para solo considerar caracteres y no numeros

//Prefix -> Directivas de rutas, para evitar /
Route::group(['prefix' => 'admin'], function () { //El prefijo es admin, por ende los /admin deben irse
    Route::get('/', 'App\Http\Controllers\AdminController@index')->name('admin.home');
    Route::get('heroes', 'App\Http\Controllers\HeroController@index')->name('admin.heroes'); //se define name para redireccionar
    Route::get('items', 'App\Http\Controllers\ItemController@index')->name('admin.items');
    Route::get('enemies', 'App\Http\Controllers\EnemyController@index')->name('admin.enemies');
});

//Ruta admin
//Route::get('/admin/{name}', 'App\Http\Controllers\AdminController@index'); //Envio de datos


/*
 $table->increments('id');
            $table->string('name');
            $table->integer('hp');
            $table->integer('atq');
            $table->integer('def');
            $table->integer('luck');
            $table->integer('coins');
            $table->integer('xp');
*/