@extends('layouts.app')

@section('content')
    <div class="row">
        <h1>Lista de Heroes</h1>
    </div>

    <div class="row">
        <a href="{{ route('admin.heroes.create') }}" class="btn btn-primary mb-2">Crear</a>
    </div>

    <div class="row" style="margin-top:10px;">
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
                    <th scope="col">Acciones</th>
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
                        <td>
                            <a href="{{ route('admin.heroes.edit', ['id' => $hero->id]) }}"
                                class="btn btn-warning mb-2">Modificar</a>
                            <a href="{{ route('admin.heroes') }}" class="btn btn-danger mb-2">Borrar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
