<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\Enemy;

//No usar resource porque ya no se basara en un modelo
class BSController extends Controller
{

    public function index()
    {
        $hero = Hero::find(1)->first(); //Mostrar el primer heroe
        $enemy = Enemy::find(1)->first(); //Mostrar el primer enemigo

        //arreglo en la base de datos
        $events = [];

        //Mientras los enemigos sigan vivos
        while ($hero->hp > 0 && $enemy->hp > 0) {
            $luck = random_int(0, 100); //suerte valor random

            if ($luck >= 50) { //Si es mayor a 50 el heroe pega
                $hp = $enemy->def - $hero->atq; //la defensa absorve el golpe

                if ($hp < 0) {
                    $enemy->hp -= $hp * -1; //Resta la vida del enemigo_acum
                }

                //dd($enemy->hp); //veremos la vida que le queda al enemigo

                //Array de eventos
                if ($enemy->hp > 0) { //si el enemigo tiene vida
                    $ev = [
                        "winner" => "hero",
                        "text" => $hero->name . " hizo un daño de " . $hero->atq . " a " . $enemy->name
                    ];
                } else {
                    $ev = [
                        "winner" => "hero",
                        "text" => $hero->name . " acabó con la vida de " . $enemy->name . " ganando " . $enemy->xp . " xp"
                    ];

                    $hero->xp = $hero->xp + $enemy->xp; //aumentando la experiencia del heroe

                    if ($hero->xp >= $hero->level->xp) { //si es mayor o igual a los xp de la table levels
                        $hero->xp = 0; //reseteo de nivel para siguiente nivel
                        $hero->level_id += 1; //aumento de nivel
                    }

                    //dd($hero->xp);

                    $hero->save(); //guardamos xp
                }

                //print("Enemy HP: " . $enemy->hp . "<br/>");

            } else {
                $hp = $hero->def - $enemy->atq;

                if ($hp < 0) {
                    $hero->hp -= $hp * -1; //Decremento de vida para heroe
                }

                if ($hero->hp > 0) {
                    $ev = [
                        "winner" => "enemy",
                        "text" => $hero->name . " recibio un daño de " . $enemy->atq . " puntos por " . $enemy->name
                    ];
                } else {
                    $ev = [
                        "winner" => "enemy",
                        "text" => $hero->name . " fue asesinado por " . $enemy->name
                    ];
                }
                //print("Hero HP: " . $hero->hp . "<br/>");
            }

            array_push($events, $ev); //setea datos en el arreglo eventos de enemigo y heroe
        }

        //dd($events);

        //dd($enemy); //Muestra los atributos en linea del model en pantalla

        return view('admin.bs.index', [
            "events" => $events,
            "heroName" => $hero->name,
            "enemyName" => $enemy->name
        ]); //vista de batallas y envio de eventos
    }
}
