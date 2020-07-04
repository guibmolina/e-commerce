@extends('layout')
@section('content')
    <div class="container mb-2">
        <form class="form-inline" action="{{route('shop.store.categ')}}" method="post">
            @csrf
            <div class="form-group mx-sm-3 mb-2">
                <label for="description" class="sr-only">Categoria</label>
                <input type="text" class="form-control" name="description" id="description" required>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Cadastrar Categoria</button>
        </form>
    </div>
@endsection
