@extends('layout')
@section('content')
<div class="text-center">
<form class="form-signin" method="post" action="{{route('shop.login')}}">
    <h1 class="h3 mb-3 font-weight-normal">Entrar</h1>
    @csrf
    <div class="form-group ">
        <label for="inputEmail" class="sr-only">E-mail</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="password" id="inputPassword" required min="1" class="form-control" placeholder="Senha" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">
        Entrar
    </button>

    <a href="/register" class="btn btn-secondary mt-3">
        Registrar-se
    </a>
</form>
</div>
  <style>
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
@endsection
