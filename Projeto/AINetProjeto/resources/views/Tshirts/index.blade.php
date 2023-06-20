@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="{{asset('css/catalogo.css')}}">
@endsection
@section('content')
<div class="t-shirts">
    <div class="t-shirts-container">
        @foreach ($tshirtImages as $tshirt)
        <div class="t-shirt-box">
            <div class="t-shirt-image">
                <img href='{{ $tshirt->image_url }}' alt="Imagem da T-shirt">
            </div>
            <div class="t-shirt-details">
                <h3>{{ $tshirt->name }}</h3>

                <div class="color-quantity-options">
                    <div class="color-options">
                        <select id="color_{{ $tshirt->id }}" name="color_{{ $tshirt->id }}">
                            <option value="">Selecione uma cor</option>
                            @foreach ($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="quantity-options">
                        <div class="quantity-controls">
                            <input type="number" id="quantity_{{ $tshirt->id }}" name="quantity_{{ $tshirt->id }}" min="1" value="1">
                        </div>
                    </div>
                </div>

                <button class="add-to-cart-button" onclick="adicionarAoCarrinho({{ $tshirt->id }})">Adicionar ao Carrinho</button>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
function adicionarAoCarrinho(tshirtId) {
    var corId = document.getElementById('color_' + tshirtId).value;
    var quantidade = document.getElementById('quantity_' + tshirtId).value;

    // Lógica para adicionar a t-shirt ao carrinho com a cor e quantidade selecionadas
    // Você pode usar AJAX ou enviar uma requisição para o backend
    // para adicionar a t-shirt ao carrinho do usuário com os valores escolhidos.
}
</script>

@endsection
