@extends('layout')
@section('content')
<div class="container">
    <h1>Adicionar Produto</h1>
<form class="needs-validation mb-2" action="{{route('shop.storeItem')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
      <div class="col-md-4 mb-10">
        <label for="validationCustom01">Nome do Produto</label>
        <input type="text" class="form-control" name='title' id="validationCustom01" placeholder="Ex:Açucar"required>
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationCustom02">Descrição do Produto</label>
        <input type="text" class="form-control" name="description" id="validationCustom02" placeholder="Ex: Açucar Organico sem glutem" required>
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationCustom02">Especificação do Produto</label>
        <input type="text" class="form-control" name="specs" id="validationCustom02" placeholder="Ex: x gramas, x gramas de sódio" required>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationCustom03">Quantidade</label>
        <input type="number" class="form-control" name="quantity" id="validationCustom03" placeholder="0" required>
      </div>
      <div class="col-md-3 mb-3">
        <label for="validationCustom04">Preço</label>
        <input type="text" class="form-control" name="price" id="validationCustom04" placeholder="3.80" required>
      </div>
      <div class="col-md-3 mb-3">
        <label for="validationCustom04">Categoria</label>
          <select class="form-control" name="category" id="category">
              @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->description}}</option>
              @endforeach
          </select>
      </div>
      <div class="col-md-3 mb-3">
        <label>Imagem do Produto</label>
        <input type="file" class="form-control" name="cover"  placeholder="Foto do Produto">
      </div>
    </div>
    <button class="btn btn-primary" type="submit">Cadastrar</button>
  </form>
</div>
  @endsection
