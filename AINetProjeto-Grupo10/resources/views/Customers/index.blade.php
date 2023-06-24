@extends('layouts.admintemplate')
@section('conteudo')
    <div>
        <p>
            <a href="customers/create">
                Add customer
            </a>
        </p>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NIF</th>
                <th>Address</th>
                <th>Default payment type</th>
                <th>Default payment Reference</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }} </td>
                    <td>{{ $customer->nif }} </td>
                    <td>{{ $customer->address }} </td>
                    <td>{{ $customer->default_payment_type }} </td>
                    <td>{{ $customer->default_payment_ref }} </td>
                    <td>
                        <a href="customers/{{ $customer->id }}/edit">
                            Edit
                        </a>
                    </td>
                    <td>
                        <form action="customers/{{ $customer->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
