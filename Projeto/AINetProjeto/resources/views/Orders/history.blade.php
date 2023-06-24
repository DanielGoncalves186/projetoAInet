@extends('layouts.clientetemplate')
@section('conteudo')
<div>
<p>
</p>
</div>
<table>
<thead>
@if ($orders->isEmpty())
    <p>No orders were made.</p>
@else
<tr>
<th>Order ID</th>
<th>Status</th>
<th>Date</th>
<th>Total Price</th>
<th>Notes</th>
<th>Nif</th>
<th>Address</th>
<th>Payment Type</th>
<th>Payment Reference</th>
<th>Receipt_url</th>
</tr>
</thead>

<tbody>
    
@foreach ($orders as $order)
<tr>
<td>{{ $order->id }} </td>
<td>{{ $order->status }} </td>
<td>{{ $order->date }} </td>
<td>{{ $order->total_price }} </td>
<td>{{ $order->notes }} </td>
<td>{{ $order->nif }} </td>
<td>{{ $order->address }} </td>
<td>{{ $order->payment_type }} </td>
<td>{{ $order->payment_ref }} </td>
<td>{{ $order->receipt_url }} </td>
</tr>
@endforeach
</tbody>
@endif
</table>


@endsection

