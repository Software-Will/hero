<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero; //Importante imporat la clase de Hero o del model necesario

class HeroController extends Controller
{
    public function index() //Tenemos que setear los datos del modelo hero para mostar en SEL
    {
        $heroes = Hero::all();

        return view('admin.heroes.index', ['heroes' => $heroes]);
    }

    //Metodo para retornar vista de insertar heroe
    public function create()
    {
        return view('admin.heroes.create');
    }


    //Metodo para insertar un heroe y redigir al SEL de heroes
    public function store(Request $request)
    {
        //Llamado del metodo saveHero
        return $this->saveHero($request, null);
        //return redirect()->route('admin.heroes');
    }

    //Metodo para mostar la vista de actualizar un heroe -> envio de id para devolver la fila
    public function edit($id)
    {
        $hero = Hero::find($id); //Nos devuelve el registro segun el id -> GET
        return view('admin.heroes.edit', ['hero' => $hero]);
    }

    //Metodo update para efectura la actualizacion de datos
    public function update(Request $request, $id)
    {
        // $hero = Hero::find($id); //GET
        return $this->saveHero($request, $id);
    }

    //Metodo para guardar un heroe sea para update o insert (store)
    public function saveHero(Request $request, $id)
    {
        if ($id) { //Si existe el id se realiza el get para el update, sino crea uno nuevo
            $hero = Hero::find($id); //GET
        } else {
            $hero = new Hero(); //Objeto del modelo Hero - si no esta el id se crea xp y level_id
            $hero->xp = 0; //se inserta solo si es store
            $hero->level_id = 1;
        }
        //Seteo de atributos, mediante la captura, sea update o store
        $hero->name = $request->input('name');
        $hero->hp = $request->input('hp');
        $hero->atq = $request->input('atq');
        $hero->def = $request->input('def');
        $hero->luck = $request->input('luck');
        $hero->coins = $request->input('coins');

        $hero->save(); //se guarda directamente en la bd

        return redirect()->route('admin.heroes');
    }
}
