@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Enemigo</h1>

    <form action="{{ route('enemy.store') }}" method="post">
        @csrf
        <!--accion sale del controlador de hero-->
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese un nombre" required>
        </div>

        <div class="form-group">
            <label for="hp">HP</label>
            <input type="number" class="form-control" id="hp" name="hp" placeholder="Ingrese los puntos de vida" min=0
                required>
        </div>

        <div class="form-group">
            <label for="atq">Ataque</label>
            <input type="number" class="form-control" id="atq" name="atq" placeholder="Ingrese los puntos de ataque" min=0
                required>
        </div>

        <div class="form-group">
            <label for="def">Defensa</label>
            <input type="number" class="form-control" id="def" name="def" placeholder="Ingrese los puntos de defensa" min=0
                required>
        </div>

        <div class="form-group">
            <label for="coins">Monedas</label>
            <input type="number" class="form-control" id="coins" name="coins" placeholder="Ingrese la cantidad de monedas"
                min=0 required>
        </div>

        <div class="form-group">
            <label for="xp">Monedas</label>
            <input type="number" class="form-control" id="xp" name="xp" placeholder="Ingrese la experiencia" min=0
                required>
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection
