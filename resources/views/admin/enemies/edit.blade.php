@extends('layouts.app')

@section('content')
    <h1>Editar Heroe - {{ $enemy->name }}</h1>

    <form action="{{ route('enemy.update', ['enemy' => $enemy->id]) }}" method="post" encrypte="multipart/form-data">>
        <!--se tiene que pasar id del heroe para update-->
        @csrf
        @method('PUT')

        @include('admin.enemies.form')

        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
@endsection
