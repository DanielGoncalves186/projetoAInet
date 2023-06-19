@extends('layouts.template')
@section('header')
<link rel="stylesheet" href="{{asset('css/template.css')}}">
<style>
#form{
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
<td>{{ $user->name }} </td>
<td>{{ $user->email }} </td>
<td>{{ $user->photo_url}} </td>
<td>{{ $user->user_type}} </td>
<td>
<a type="button" class="btn btn-info" href="users/edit/{{$user->id}}">
Edit
</a>
</td>
<td>
<form action="users/{{$user->id}}"
method="POST">
@csrf
@method("DELETE")
<a type="button" class="btn btn-danger" value="Delete"> delete </a>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
@endsection
<script>
  const form = document.querySelector('form');
  const emailInput = document.getElementById('emailInput');

  form.addEventListener('submit', (event) => {
    event.preventDefault();
    const email = decodeURIComponent(emailInput.value.trim());
    const url = `/users/email/${encodeURIComponent(email)}`;

    window.location.href = url;
  });
</script>