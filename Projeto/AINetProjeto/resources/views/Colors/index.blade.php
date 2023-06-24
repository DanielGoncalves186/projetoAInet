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
                <th>Deleted at</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($colors as $color)
                <tr>
                    <td>{{ $color->code }} </td>
                    <td>{{ $color->name }} </td>
                    <td>{{ $color->deleted_at }} </td>
                    <td>
                        <a a type="button" class="btn btn-info" href="colors/{{ $color->code }}/edit">
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
