@extends('layout')
@section('content')

  <!-- Page Content -->
  <div class="container">

    <div class="row">
      <!-- /.col-lg-3 -->

      <div class="col-lg-8 mr-auto">

        <div class="card mt-4 mb-2">
          <img class="card-img-top" src="{{$item->cover_url}}" alt="">
          <div class="card-body">
          <h3 class="card-title">{{$item->title}}</h3>
            <h4>R$ {{number_format($item->price, 2, ',', '.')}}</h4>
            <p class="card-text">{{$item->specs}}</p>
            <p class="card-text">{{$item->description}}</p>
            <p class="card-text">Estoque: {{$item->quantity}}</p>

            <p>Nota<span class="text-warning"> &#9733; &#9733; &#9733; &#9733; &#9734;</span></p>
          </div>
          <a href="/product/{{$item->id}}/cart"><button class="button btn-lg btn-success ml-2 mb-2">Comprar</button></a>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  @endsection
