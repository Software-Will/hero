@extends('layouts.app')
<!--Diseño de app-->

@section('content')
    <div class="row">
        <h1>Administrador de Hero</h1>
    </div>

    <div class="row">
        <table class="table table-hover">
            <thead style="text-align: center; font-weight: bold;">
                <tr>
                    <th>Entidad</th>
                    <th>Cantidad de Elementos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                @foreach ($report as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <!--Trabjamos de esta manera por es de forma array y no tipo objeto-->
                        <td>{{ $item['counter'] }}</td>
                        <td>
                            <a href=" {{ route($item['route']) }}" class="btn {{ $item['class'] }}">Ir a
                                {{ $item['name'] }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
