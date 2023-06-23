@extends('layouts.admintemplate')
@section('conteudo')
    <p></p>
    <div>
        <p>
            <a href="colors/create">
                Add color
            </a>
        </p>
    </div>
    <table>
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($colors as $color)
                <tr>
                    <td>{{ $color->code }} </td>
                    <td>{{ $color->name }} </td>
                    <td>
                        <a href="colors/{{ $color->code }}/edit">
                            Edit
                        </a>
                    </td>
                    <td>
                        <form action="colors/{{ $color->code }}" method="POST">
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
