@extends('layouts.app')

@section('content')
    <h1>Editar Heroe - {{ $enemy->name }}</h1>

    <form action="{{ route('enemy.update', ['enemy' => $enemy->id]) }}" method="post">
        <!--se tiene que pasar id del heroe para update-->
        @csrf
        @method('PUT')
        <!--update-->
        <!--accion sale del controlador de hero-->
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" value="{{ $enemy->name }}" name="name"
                placeholder="Ingrese un nombre" required>
        </div>

        <div class="form-group">
            <label for="hp">HP</label>
            <input type="number" class="form-control" id="hp" name="hp" value="{{ $enemy->hp }}"
                placeholder="Ingrese los puntos de vida" required>
        </div>

        <div class="form-group">
            <label for="atq">Ataque</label>
            <input type="number" class="form-control" id="atq" name="atq" value="{{ $enemy->atq }}"
                placeholder="Ingrese los puntos de ataque" required>
        </div>

        <div class="form-group">
            <label for="def">Defensa</label>
            <input type="number" class="form-control" id="def" name="def" value="{{ $enemy->def }}"
                placeholder="Ingrese los puntos de defensa" required>
        </div>

        <div class="form-group">
            <label for="coins">Monedas</label>
            <input type="number" class="form-control" id="coins" name="coins" value="{{ $enemy->coins }}"
                placeholder="Ingrese la cantidad de monedas" required>
        </div>

        <div class="form-group">
            <label for="xp">Experiencia</label>
            <input type="number" class="form-control" id="xp" name="xp" value="{{ $enemy->xp }}"
                placeholder="Ingrese la experiencia" required>
        </div>

        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
@endsection
