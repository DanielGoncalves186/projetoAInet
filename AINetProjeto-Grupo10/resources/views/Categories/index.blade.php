@extends('layouts.admintemplate')
@section('conteudo')
    <p></p>
    <div>
        <p>
            <a href="categories/create">
                Add Category
            </a>
        </p>
    </div>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }} </td>
                    <td>{{ $category->name }} </td>
                    <td>
                        <a href="categories/{{ $category->id }}/edit">
                            Edit
                        </a>
                    </td>
                    <td>
                        <form action="categories/{{ $category->id }}" method="POST">
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
