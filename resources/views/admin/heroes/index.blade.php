@extends('layouts.app')

@section('content')
    <h1>Heroes</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">HP</th>
                <th scope="col">Ataque</th>
                <th scope="col">Defensa</th>
                <th scope="col">Suerte</th>
                <th scope="col">Monedas</th>
                <th scope="col">Experencia</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($heroes as $hero)
                <!--Foreach para muestrear todos los datos de la bd-->
                <tr>
                    <th scope="row">{{ $hero->id }}</th>
                    <td>{{ $hero->name }}</td>
                    <!--fila -> atributo de la tabla heroe-->
                    <td>{{ $hero->hp }}</td>
                    <td>{{ $hero->atq }}</td>
                    <td>{{ $hero->def }}</td>
                    <td>{{ $hero->luck }}</td>
                    <td>{{ $hero->coins }}</td>
                    <td>{{ $hero->xp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
