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
    <div>
        <p>
            <a href="tshirt/create">
                Add tshirt
            </a>
        </p>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer id</th>
                <th>Category id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Deleted at</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($tshirtImages as $tshirt)
                <tr>
                    <td>{{ $tshirt->id }} </td>
                    <td>{{ $tshirt->customer_id }} </td>
                    <td>{{ $tshirt->category_id }} </td>
                    <td>{{ $tshirt->name }} </td>
                    <td>{{ $tshirt->description }} </td>
                    <td><img src='{{ $tshirt->image_url }}'></td>
                    <td>{{ $tshirt->created_at }} </td>
                    <td>{{ $tshirt->updated_at }} </td>
                    <td>{{ $tshirt->deleted_at }} </td>
                    <td>
                        <a a type="button" class="btn btn-info" href="tshirt/{{ $tshirt->id }}/edit">
                            Edit
                        </a>
                    </td>
                    <td>
                        <form action="tshirt/{{ $tshirt->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
