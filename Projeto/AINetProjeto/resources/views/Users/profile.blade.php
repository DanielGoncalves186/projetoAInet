
<div>
</div>
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
<tr>
<td>{{ $user->name }} </td>
<td>{{ $user->email }} </td>
<td>{{ $user->photo_url}} </td>
<td>{{ $user->user_type}} </td>
<td>
<a href="users/{{$user->id}}/edit">
Edit
</a>
</td>
<td>
<form action="users/{{$user->id}}"
method="POST">
@csrf
@method("DELETE")
<input type="submit" value="Delete">
</form>
</td>
</tr>
</tbody>
</table>
@endsection