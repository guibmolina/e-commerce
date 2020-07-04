@extends('layout')
@section('content')

  <!-- Page Content -->

  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h3 class="my-4">Bem vindo

              {{$userName ?? ''}}

        </h3>
         <div class="list-group">
             Categorias
             @auth
                 <a href="{{route('shop.store.categ')}}" class="btn btn-success btn-sm">Adicionar Categoria</a>
             @endauth
             @if($categories)
                 @foreach ($categories as $category)
                     <div class="list-group-item d-flex justify-content-between">
                         <a href="/categories/{{$category->id}}/products">{{$category->description}}</a>
                     @auth
                         <form action='{{url("categories/$category->id")}}' method="post" onsubmit="return confirm('Tem certeza que deseja remover a categoria{{ addslashes($category->description)}}?')">
                             @csrf
                             @method('DELETE')
                             <button class="btn btn-danger btn-sm">Excluir</button>
                         </form>
                     @endauth
                     </div>
                 @endforeach
             @endif
        </div>


      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
          <div class="carousel-inner mb-2" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="/images/background-market.png" alt="First slide">
            </div>
        </div>
        <div class="row">
          <a href='https://teams.microsoft.com/l/chat/0/0?users=28:6ea83f19-c823-446b-9786-b492d6f23d53'><img src='https://dev.botframework.com/Client/Images/Add-To-MSTeams-Buttons.png'/></a>
          @if($items)
            @foreach ($items as $item)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
            <a href="#"><img class="card-img-top" src={{$item->cover_url}} alt="{{$item->filename}}"></a>
              <div class="card-body">
                <h4 class="card-title">
                <a href="/product/{{$item->id}}">{{$item->title}}</a>
                </h4>
              <h5>R${{number_format($item->price, 2, ',', '.')}}</h5>
              <p class="card-text">{{$item->description}}</p>
              @auth
             <small>Estoque {{$item->quantity}}</small>
              @endauth
              </div>
              <div class="card-footer d-flex justify-content-between">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                @guest
              <a href="/product/{{$item->id}}/cart"><button class="button btn-sm btn-info ">Comprar</button></a>
                @endguest
                @auth
                <a href="stock/{{$item->id}}" class="button btn-sm btn-info ">Estoque</a>
                <form action='{{url("product/$item->id")}}' method="post" onsubmit="return confirm('tem certeza que deseja remover o produto {{ addslashes($item->title)}}?')">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm">Excluir</button>
                </form>
                @endauth
              </div>
            </div>
          </div>
          @endforeach
            @else
                <h3> Sem Produtos Disponiveis</h3>
            @endif

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  @endsection
