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
}
