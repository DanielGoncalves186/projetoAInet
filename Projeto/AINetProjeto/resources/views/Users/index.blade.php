@extends('layouts.app')

@section('header')
<link rel="stylesheet" href="{{ asset('css/template.css') }}">
<style>
#form {
    display: flex;
    flex-direction: row;
}
</style>
@endsection

@section('content')
<div>
    <p></p>
</div>
<form method="GET" action="users/email">
    <a type="button" class="btn btn-secondary" href="/users/create">Add User</a>
    <input type="text" name="email" id="emailInput" placeholder="Enter Email">
    <button type="submit">Search</button>
</form>
<p></p>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Photo_Url</th>
            <th>Type</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->photo_url }}</td>
            <td>{{ $user->user_type }}</td>
            <td>
                <a type="button" class="btn btn-info" href="users/edit/{{$user->id}}">
                    Edit
                </a>
            </td>
            <td>
                <form id="deleteUser{{$user->id}}" action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('scripts')
<script>
function confirmDelete(event) {
    if (!confirm('Are you sure you want to delete this user?')) {
        event.preventDefault();
        return false;
    }
    return true;
}
</script>
@endsection