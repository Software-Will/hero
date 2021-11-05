@extends('layouts.app')

@section('content')
    <h1>Editar Heroe - {{ $hero->name }}</h1>

    <form action="{{ route('heroes.update', ['hero' => $hero->id]) }}" method="post">
        <!--se tiene que pasar id del heroe para update-->
        @csrf
        @method('PUT')
        <!--update-->
        <!--accion sale del controlador de hero-->
        @include('admin.heroes.form')

        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
@endsection
