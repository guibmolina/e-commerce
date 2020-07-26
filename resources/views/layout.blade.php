<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mercadinho do Zé</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/12ae231401.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="<?php echo asset('css/app.css')?>" type="text/css">


</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between mb-3">
    <div class="container">
      <a class="navbar-brand" href="/shop">Mercadinho do Zé</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/shop">Inicio
              <span class="sr-only">(current)</span>
            </a>
            @guest
          <li class="nav-item">
            <a class="nav-link" href="{{route('shop.login.index')}}">Entrar</a>
          </li>
          @endguest
          @auth
          <li class="nav-item">
          <a class="nav-link" href="{{route ('shop.add')}}">Adicionar Produto</a>
          </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route ('shop.unavaible')}}">Produto Indisponiveis</a>
                </li>
          <li class="nav-item">
            <a class="nav-link" href="/out">Sair</a>
            </li>
          @endauth
          @guest
          <li class="mt-2 ml-2">
            <a href="{{route ('product.checkout')}}"><i class="fas fa-shopping-cart"></i></a>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
  @include('mensagem',['mensagem' => $mensagem ?? ''])
@yield('content')

</body>

</html>
<style>
  #sticky-footer {
  flex-shrink: none;
}
html,
body {
  height: 100%;
}
</style>
