<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CarrinhoController extends Controller
{
    public function adicionar(Request $request)
    {
        // Recupera os dados do formulário
        $tshirtId = $request->input('tshirt_id');
        $corId = $request->input('cor_id');
        $tamanho = $request->input('tamanho');
        $quantidade = $request->input('quantidade');

        // Obtém o carrinho da sessão
        $carrinho = Session::get('carrinho', []);

        // Verifica se a t-shirt já está no carrinho
        $itemIndex = $this->procurarItemNoCarrinho($carrinho, $tshirtId, $corId, $tamanho);

        if ($itemIndex !== false) {
            // A t-shirt já está no carrinho, então atualiza a quantidade
            $carrinho[$itemIndex]['quantidade'] += $quantidade;
        } else {
            // A t-shirt não está no carrinho, então adiciona um novo item
            $item = [
                'tshirt_id' => $tshirtId,
                'cor_id' => $corId,
                'tamanho' => $tamanho,
                'quantidade' => $quantidade,
            ];

            $carrinho[] = $item;
        }

        // Guarda o carrinho na sessão
        Session::put('carrinho', $carrinho);

        // Retorna uma resposta adequada (por exemplo, JSON, redirecionamento etc.)
        return response()->json(['message' => 'Item adicionado ao carrinho com sucesso']);
    }

    private function procurarItemNoCarrinho($carrinho, $tshirtId, $corId, $tamanho)
    {
        foreach ($carrinho as $index => $item) {
            if ($item['tshirt_id'] == $tshirtId && $item['cor_id'] == $corId && $item['tamanho'] == $tamanho) {
                return $index;
            }
        }

        return false;
    }

    public function index()
    {
        $carrinho = $this->getItensCarrinho();

        return view('carrinho', compact('carrinho'));
    }

    /*private function getItemsCarrinho()
    {
        $carrinho = [
            [
                'tshirt' => [
                    'id' => 1,
                    'name' => 'T-Shirt 1',
                    'image_url' => 'path_to_image_1',
                ],
                'cor' => [
                    'id' => 1,
                    'name' => 'Red',
                ],
                'tamanho' => 'M',
                'quantidade' => 2,
            ],
            [
                'tshirt' => [
                    'id' => 2,
                    'name' => 'T-Shirt 2',
                    'image_url' => 'path_to_image_2',
                ],
                'cor' => [
                    'id' => 2,
                    'name' => 'Blue',
                ],
                'tamanho' => 'L',
                'quantidade' => 1,
            ],
            // ...
        ];

        return $carrinho;
    }*/
}
