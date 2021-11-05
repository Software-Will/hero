@extends('layouts.app')

@section('content')

    <div class="row">
        <h1>Sistema de Batalla</h1>
    </div>

    <!--Sistemas de columnas col- 5 2 5: total de 12-->
    <div class="row text-center text-white mt-2">
        <div class="col-5 bg-primary">
            <h2>HERO : {{ $heroName }} </h2>
        </div>
        <div class="col bg-warning">
            <h2>VS</h2>
        </div>

        <div class="col-5 bg-danger">
            <h2>ENEMY : {{ $enemyName }}</h2>
        </div>
    </div>

    <div class="row text-white mt-2 bg-info">
        <div class="col text-center">
            <h2>Eventos de Batalla</h2>
        </div>
    </div>

    <div class="mt-3">
        <!--Recorremos el arreglo del controlador y realizamos conficional para el color del alert-->
        @foreach ($events as $ev)
            <div class="alert  @if ($ev['winner'] == 'hero') alert-success @else alert-danger" @endif" role="alert">
                {{ $ev['text'] }}
            </div>
        @endforeach
    </div>
@endsection
