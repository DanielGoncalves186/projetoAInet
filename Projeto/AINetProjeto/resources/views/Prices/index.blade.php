@extends('layouts.admintemplate')
@section('head')
<link rel="stylesheet" href="{{ asset('css/template.css') }}">
<style>
#form {
    display: flex;
    flex-direction: row;
}
</style>
@endsection

@section('conteudo')
    <p></p>
    <table>
        <thead>
            <tr>
                <th>Unit_price_catalog</th>
                <th>Unit_price_own</th>
                <th>Unit_price_catalog_discount</th>
                <th>Qty_discount</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($prices as $price)
                <tr>
                    <td>{{ $price->unit_price_catalog }} </td>
                    <td>{{ $price->unit_price_own }} </td>
                    <td>{{ $price->unit_price_catalog_discount }} </td>
                    <td>{{ $price->qty_discount }} </td>
                    <td>
                        <a a type="button" class="btn btn-info" href="prices/{{ $price->id }}/edit">
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
