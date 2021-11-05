@extends('layouts.app')

@section('content')
    <div class="row">
        <h1>Lista de Items</h1>
    </div>

    <div class="row">
        <a href="{{ route('item.create') }}" class="btn btn-primary mb-2">Crear</a>
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
                    <th scope="col">Costo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <!--Foreach para muestrear todos los datos de la bd-->
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <!--fila -> atributo de la tabla heroe-->
                        <td>{{ $item->hp }}</td>
                        <td>{{ $item->atq }}</td>
                        <td>{{ $item->def }}</td>
                        <td>{{ $item->luck }}</td>
                        <td>{{ $item->cost }}</td>
                        <td>
                            <div class="row">

                                <div class="col">
                                    <a href="{{ route('item.edit', ['item' => $item->id]) }}"
                                        class="btn btn-warning mb-2">Modificar</a>
                                </div>

                                <div class="col">
                                    <form action="{{ route('item.destroy', ['item' => $item->id]) }}" method="post">
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
