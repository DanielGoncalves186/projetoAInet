@extends('layouts.template')
@section('content')
<div>
<p>
<a href="orders/create">
Add order
</a>
</p>
</div>
<table>
<thead>
<tr>
<th>ID</th>
<th>Status</th>
<th>Customer ID</th>
<th>Date</th>
<th>Total Price</th>
<th>Notes</th>
<th>Nif</th>
<th>Address</th>
<th>Payment Type</th>
<th>Payment Reference</th>
<th>Reveipt_url</th>
</tr>
</thead>

<tbody>
@foreach ($orders as $order)
<tr>
<td>{{ $order->id }} </td>
<td>{{ $order->status }} </td>
<td>{{ $order->customer_id }} </td>
<td>{{ $order->date }} </td>
<td>{{ $order->total_price }} </td>
<td>{{ $order->notes }} </td>
<td>{{ $order->nif }} </td>
<td>{{ $order->address }} </td>
<td>{{ $order->payment_type }} </td>
<td>{{ $order->payment_ref }} </td>
<td>{{ $order->receipt_url }} </td>
<td>
<a href="orders/{{$order->id}}/edit">
Edit
</a>
</td>
<td>
<form action="orders/{{$order->id}}"
method="POST">
@csrf
@method("DELETE")
<input type="submit" value="Delete">
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
@endsection