@extends('layouts.app')

@section('content')

    <div class="row">
        <h1>Sistema de Batalla</h1>
    </div>

    <!--Sistemas de columnas col- 5 2 5: total de 12-->
    <div class="row text-center text-white mt-2">
        <div class="col-5 bg-primary">
            <h2>HERO</h2>
        </div>
        <div class="col bg-warning">
            <h2>VS</h2>
        </div>

        <div class="col-5 bg-danger">
            <h2>ENEMY</h2>
        </div>
    </div>

    <div class="row text-white mt-2 bg-info">
        <div class="col text-center">
            <h2>Eventos de Batalla</h2>
        </div>
    </div>

    <div class="mt-3">
        <div class="alert alert-success" role="alert">
            Hero hace un ataque de 15 a Enemigo!
        </div>
        <div class="alert alert-danger" role="alert">
            Enemigo hace un daño a Hero de 10!...
        </div>
    </div>
@endsection
