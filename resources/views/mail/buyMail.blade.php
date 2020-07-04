@foreach($cart as $product)
    <h1>Nome do produto: {{$product['name']}}</h1>
    <h1>QTD: {{$product['quantity']}}</h1>
    <h1>Preco: R${{$product['price']}}</h1>
    <h1>Descricao: {{$product['description']}}</h1>
@endforeach
