@extends('layout')
@section('content')



  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <h2>Formulário de checkout</h2>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Seu carrinho</span>
          </h4>
          <ul class="list-group mb-3">
            <?php $total = 0 ?>
            <?php $qtdTotal = 0 ?>

            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    <?php $total +=$details['price'] * $details['quantity'] ?>
                    <?php $qtdTotal +=$details['quantity'] ?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{$details['name']}}</h6>
                  <a href="/product/{{$details['id']}}/cart/remove"> <i class="fa fa-trash"></i></a>
              <small class="text-muted">{{$details['description']}}</small>
              <small class="text-muted">x{{$details['quantity']}}</small>
              </div>
              <span class="text-muted">R$ {{number_format($details['price'] * $details['quantity'], 2, ',', '.')}}</span>
            </li>
            @endforeach
            @endif
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Total</h6>
              <small class="text-muted">Qtd Itens: {{$qtdTotal}}</small>
              </div>
              <span class="text-muted">R$ {{number_format($total, 2, ',', '.')}}</span>
            </li>
          </ul>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Endereço de cobrança</h4>
          <form class="needs-validation" novalidate action="{{route('shop.buyItem')}}" method="POST">
              @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="primeiroNome">Nome</label>
                <input type="text" class="form-control" name="first_name" id="primeiroNome" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" class="form-control" id="sobrenome" placeholder="" value="">
              </div>
            </div>
            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Obrigatório)</span></label>
              <input type="email" class="form-control" name="email" id="email" placeholder="fulano@exemplo.com" required>
            </div>

            <div class="mb-3">
              <label for="endereco">Endereço</label>
              <input type="text" class="form-control" id="endereco" placeholder="Rua dos bobos, nº 0">
            </div>
            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="pais">País</label>
                <select class="custom-select d-block w-100" id="pais">
                  <option value="">Escolha...</option>
                  <option>Brasil</option>
                </select>
                <div class="invalid-feedback">
                  Por favor, escolha um país válido.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="estado">Estado</label>
                <select class="custom-select d-block w-100" id="estado">
                  <option value="">Escolha...</option>
                  <option>Acre</option>
                </select>
                <div class="invalid-feedback">
                  Por favor, insira um estado válido.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" id="cep" placeholder="">
                <div class="invalid-feedback">
                  É obrigatório inserir um CEP.
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="mesmo-endereco">
              <label class="custom-control-label" for="mesmo-endereco">Endereço de entrega é o mesmo que o de cobrança.</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="salvar-info">
              <label class="custom-control-label" for="salvar-info">Lembrar desta informação, na próxima vez.</label>
            </div>
            <hr class="mb-4">

            <h4 class="mb-3">Pagamento</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credito" name="" type="radio" class="custom-control-input">
                <label class="custom-control-label" for="credito">Cartão de crédito</label>
              </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-nome">Nome no cartão</label>
                <input type="text" class="form-control" id="cc-nome" placeholder="">
                <small class="text-muted">Nome completo, como mostrado no cartão.</small>
                <div class="invalid-feedback">
                  O nome que está no cartão é obrigatório.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-numero">Número do cartão de crédito</label>
                <input type="text" class="form-control" id="cc-numero" placeholder="">
                <div class="invalid-feedback">
                  O número do cartão de crédito é obrigatório.
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiracao">Data de expiração</label>
                <input type="text" class="form-control" id="cc-expiracao" placeholder="">
                <div class="invalid-feedback">
                  Data de expiração é obrigatória.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-cvv">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="">
                <div class="invalid-feedback">
                  Código de segurança é obrigatório.
                </div>
              </div>
            </div>
            <hr class="mb-4">
                @if(!session('cart'))
                <button class="btn btn-primary btn-lg btn-block" disabled>Finalizar</button>
                @else
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Finalizar</button>
                @endif

            </div>
          </form>
        </div>
      </div>
    </div>
      @endsection
  </body>
</html>
