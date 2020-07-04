@extends('layout')
@section('content')
<div class="container mb-2">
{{-- <form method="post">
    @csrf
    <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationCustom03">Quantidade</label>
        <input type="number" class="form-control" name="quantity" id="validationCustom03" placeholder="{{$item->quantity}}" required>
        </div>
    <button type="submit" class="btn btn-primary mt-3">
        Enviar
    </button>
</form> --}}
<form class="form-inline" method="post">
    @csrf
    <div class="form-group mb-2">
      <label for="staticEmail2" class="sr-only">Atual:</label>
      <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Atual: {{$item->quantity}}">
    </div>
    <div class="form-group mx-sm-3 mb-2">
      <label for="qtd" class="sr-only"></label>
      <input type="number" class="form-control"  name="quantity" id="qtd" placeholder="{{$item->quantity}}" value="{{$item->quantity}}" required>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Atualizar Estoque</button>
  </form>
</div>

@endsection