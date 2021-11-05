@extends('layouts.app')

@section('content')
    <h1>Lista de Enemigos</h1>
    <div class="row">
        <a href="{{ route('enemy.create') }}" class="btn btn-primary mb-2">Crear</a>
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
                    <th scope="col">Monedas</th>
                    <th scope="col">Experiencia</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enemies as $enemy)
                    <!--Foreach para muestrear todos los datos de la bd-->
                    <tr>
                        <th scope="row">{{ $enemy->id }}</th>
                        <td>{{ $enemy->name }}</td>
                        <!--fila -> atributo de la tabla heroe-->
                        <td>{{ $enemy->hp }}</td>
                        <td>{{ $enemy->atq }}</td>
                        <td>{{ $enemy->def }}</td>
                        <td>{{ $enemy->coins }}</td>
                        <td>{{ $enemy->xp }}</td>
                        <td>
                            <div class="row">

                                <div class="col">
                                    <a href="{{ route('enemy.edit', ['enemy' => $enemy->id]) }}"
                                        class="btn btn-warning mb-2">Modificar</a>
                                </div>

                                <div class="col">
                                    <form action="{{ route('enemy.destroy', ['enemy' => $enemy->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <!--El metodo reconoce que delete lo va a destruir-->
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
