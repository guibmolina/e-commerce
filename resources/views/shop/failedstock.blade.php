@extends('layout')
@section('content')

    <!-- Page Content -->

    <div class="container">
        @if($items)
        <h2>Lista de Produtos indisponiveis</h2>
        <ul class="list-group">
            @foreach($items as $item)
                <div class="list-group-item d-flex justify-content-between">
                    <li class="list-group">{{$item->title}}</li>
                    <a href="stock/{{$item->id}}" class="button btn-sm btn-info ">Adicionar Estoque</a>
                </div>
            @endforeach
        </ul>
        @else
        <h2>Não Possui Itens Indisponiveis no momento</h2>
        @endif
    </div>
        <!-- /.container -->

        <!-- Footer -->
@endsection
