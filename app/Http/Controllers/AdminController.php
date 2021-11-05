<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\Item;
use App\Models\Enemy;

class AdminController extends Controller
{
    public function index()
    {
        //Contamos las n filas de las tablas
        $heroCounter = Hero::count();
        $itemCounter = Item::count();
        $enemyCounter = Enemy::count();

        //array de array con elementos de entidades
        $report = [
            ['name' => "Heroes", 'counter' => $heroCounter, 'route' => 'heroes.index', 'class' => 'btn-primary'],
            ['name' => "Items", 'counter' => $itemCounter, 'route' => 'item.index', 'class' => 'btn-warning'],
            ['name' => "Enemigos", 'counter' => $enemyCounter, 'route' => 'enemy.index', 'class' => 'btn-danger']
        ];

        //return view('admin.index', ['name' => $name]);
        return view('admin.index', ['report' => $report]);
    }
}
