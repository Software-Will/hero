@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Item</h1>

    <form action="{{ route('item.store') }}" method="post">
        @csrf
        <!--accion sale del controlador de hero-->
        @include('admin.items.form')

        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection
