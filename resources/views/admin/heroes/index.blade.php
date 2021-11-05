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
            <tr>
                <th scope="row">1</th>
                <td>{{ $heroes[0]->name }}</td>
                <td>10</td>
                <td>5</td>
                <td>5</td>
                <td>15</td>
                <td>150</td>
                <td>100</td>
            </tr>
        </tbody>
    </table>
@endsection
