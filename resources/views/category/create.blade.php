@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Adicionar Categoria</h3>

        <form action="{{route('category.store')}}" method="POST">
            @include('category._form')
        </form>
    </div>
@endsection
