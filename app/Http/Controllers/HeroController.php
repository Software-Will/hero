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

    //Metodo para retornar vista de heroe
    public function create()
    {
        return view('admin.heroes.create');
    }

    //Metodo para insertar un heroe y redigir al SEL de heroes
    public function store(Request $request)
    {
        $hero = new Hero(); //Objeto del modelo Hero
        //Captura de atributos
        $hero->name = $request->input('name');
        $hero->hp = $request->input('hp');
        $hero->atq = $request->input('atq');
        $hero->def = $request->input('def');
        $hero->luck = $request->input('luck');
        $hero->coins = $request->input('coins');
        $hero->xp = 0;
        $hero->level_id = 1;

        $hero->save(); //se guarda directamente en la bd

        return redirect()->route('admin.heroes');
    }
}
