@extends('layouts.admintemplate')

@section('conteudo')
<h2>Statistics</h2>

<h4>Total of categories: {{ count($allCategories) }}</h4>
<h4>Total of colors: {{ count($allColors) }}</h4>
<h4>Total of customers: {{ count($allCustomers) }}</h4>
<h4>Total of orders: {{ count($allOrders) }}</h4>
<h4>Total of TshirtImages: {{ count($allTshirtImages) }}</h4>
<h4>Total of users: {{ count($allUsers) }}</h4>
<h4>Unitary price (catalog): {{ $price->unit_price_catalog }}€</h4>

@endsection
