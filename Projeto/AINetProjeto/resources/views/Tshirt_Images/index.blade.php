@extends('layout')

@section('header-title', 'Catálogo de T-shirts')

@section('main')
<div class="t-shirts">
    <div class="t-shirts-container">
        @foreach ($tshirtImages as $tshirt)
        <div class="t-shirt-box">
            <div class="t-shirt-image">
                <img src='{{ $tshirt->image_url }}' alt="Imagem da T-shirt">
            </div>
            <div class="t-shirt-details">
                <h3>{{ $tshirt->name }}</h3>

                <div class="color-quantity-options">
                    <div class="color-options">
                        <label for="color_{{ $tshirt->id }}">Escolha uma cor:</label>
                        <select id="color_{{ $tshirt->id }}" name="color_{{ $tshirt->id }}">
                            <option value="">Selecione uma cor</option>
                            @foreach ($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="quantity-options">
                        <div class="quantity-controls">
                            <button onclick="atualizarQuantidade({{ $tshirt->id }}, -1)">-</button>
                            <input type="number" id="quantity_{{ $tshirt->id }}" name="quantity_{{ $tshirt->id }}" min="1" value="1">
                            <button onclick="atualizarQuantidade({{ $tshirt->id }}, 1)">+</button>
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
function atualizarQuantidade(tshirtId, valor) {
    var quantidadeInput = document.getElementById('quantity_' + tshirtId);
    var quantidade = parseInt(quantidadeInput.value) + valor;

    if (quantidade >= 1) {
        quantidadeInput.value = quantidade;
    }
}

function adicionarAoCarrinho(tshirtId) {
    var corId = document.getElementById('color_' + tshirtId).value;
    var quantidade = document.getElementById('quantity_' + tshirtId).value;

    // Lógica para adicionar a t-shirt ao carrinho com a cor e quantidade selecionadas
    // Você pode usar AJAX ou enviar uma requisição para o backend
    // para adicionar a t-shirt ao carrinho do usuário com os valores escolhidos.
}
</script>

<style>
.t-shirts-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: space-between;
}

.t-shirt-box {
    width: calc((100% - 30px) / 4);
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.t-shirt-image {
    margin-bottom: 10px;
}

.t-shirt-image img {
    width: 100%;
    height: auto;
}

.t-shirt-details {
    text-align: center;
    flex-grow: 1;
}

.t-shirt-details h3 {
    font-size: 20px;
    margin-bottom: 5px;
}

.color-quantity-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.color-options {
    flex-grow: 1;
    margin-right: 5px;
}

.color-options select {
    width: 100%;
}

.quantity-options {
    flex-grow: 1;
    margin-left: 5px;
}

.quantity-controls {
    display: flex;
    gap: 5px;
    align-items: center;
}

.quantity-controls button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

.add-to-cart-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: auto;
    width: 100%;
}
</style>
@endsection
