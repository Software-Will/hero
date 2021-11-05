@extends('layouts.app')

@section('content')
    <h1>Editar Item - {{ $item->name }}</h1>

    <form action="{{ route('item.update', ['item' => $item->id]) }}" method="post">
        <!--se tiene que pasar id del heroe para update-->
        @csrf
        @method('PUT')

        @include('admin.items.form')

        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
@endsection
