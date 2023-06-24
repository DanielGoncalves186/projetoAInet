@extends('layouts.clientetemplate')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/catalogo.css') }}">
@endsection

@section('conteudo')
    <p></p>
    <h2>TShirts</h2>
    <p></p>
    <div class="search-bar">
        <form action="{{ route('tshirt.index') }}" method="GET">
            @csrf
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search by name"
                    value="{{ request('search') }}">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <p></p>
    <div class="t-shirts">
        <div class="t-shirts-container">
            @foreach ($tshirtImages as $tshirt)
                <div class="t-shirt-box">
                    <div class="t-shirt-image">
                        <img src='{{ $tshirt->image_url }}' alt="Imagem da T-shirt">
                    </div>
                    <div class="t-shirt-details">
                        <h3>{{ $tshirt->name }}</h3>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            {{ $tshirt->description }}
                        </div>

                        <div class="color-quantity-options">
                            <div class="color-options">
                                <select id="color_{{ $tshirt->id }}" name="color_{{ $tshirt->id }}">
                                    <option value="">Select a color</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="size-options">
                                <select id="size_{{ $tshirt->id }}" name="size_{{ $tshirt->id }}">
                                    <option value="">Select a size</option>
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                            </div>

                            <div class="quantity-options">
                                <div class="quantity-controls">
                                    <input type="number" id="quantity_{{ $tshirt->id }}"
                                        name="quantity_{{ $tshirt->id }}" min="1" value="1">
                                </div>
                            </div>
                        </div>

                        <button class="add-to-cart-button" onclick="adicionarAoCarrinho({{ $tshirt->id }})">Add to cart
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <p></p>
    <!--
                    <div class="carrinho-container">
                    <h2>Meu Carrinho</h2>
                    <div class="carrinho-items">
                        {{-- @foreach ($carrinho as $item) --}}
                            {{-- <div class="carrinho-item">
                <div class="carrinho-item-image">
                    <img src="{{ $item['tshirt']->image_url }}" alt="Imagem da T-shirt">
                </div>
                <div class="carrinho-item-details">
                    <h4>{{ $item['tshirt']->name }}</h4>
                    <p>Cor: {{ $item['cor']->name }}</p>
                    <p>Tamanho: {{ $item['tamanho'] }}</p>
                    <p>Quantidade: {{ $item['quantidade'] }}</p>
                </div>
            </div> --}}
                        {{-- @endforeach --}}
                    </div>
                </div>
                -->
    <script>
        function adicionarAoCarrinho(tshirtId) {
            var corId = document.getElementById('color_' + tshirtId).value;
            var tamanho = document.getElementById('size_' + tshirtId).value;
            var quantidade = document.getElementById('quantity_' + tshirtId).value;

            // Faz a requisição AJAX para adicionar ao carrinho
            $.ajax({
                url: '{{ route('carrinho.adicionar') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    tshirt_id: tshirtId,
                    cor_id: corId,
                    tamanho: tamanho,
                    quantidade: quantidade
                },
                success: function(response) {
                    // Lida com a resposta de sucesso
                    alert(response.message);

                    // Recarrega a página ou atualiza o carrinho de compras de acordo com suas necessidades
                    location.reload();
                },
                error: function(error) {
                    // Lida com o erro (opcional)
                    console.log(error);
                }
            });
        }
    </script>
@endsection
