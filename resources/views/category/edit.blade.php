@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Editar Categoria</h3>

        <form action="{{routeTenant('category.update', ['id' => $category->id])}}" method="post">
            @include('category._form', $category)
        </form>
    </div>
@endsection
