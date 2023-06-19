@extends('layouts.template')
@section('content')
<form action="{{ action([App\Http\Controllers\UserController::class,
'store']) }}" method="post">
@csrf
<div>
<label for="inputName">Name</label>
<input type="text" name="name" id="inputName" value="{{ old('name') }}">
@error('name')
<em>{{ $message}}</em>
@enderror
</div>
<div>
<label for="inputEmail">Email</label>
<input type="text" name="email" id="inputEmail" value="{{ old('email') }}">
@error('email')
<em>{{ $message}}</em>
@enderror
</div>
<div>
<label for="inputPassword">Password</label>
<input type="text" name="password" id="password" value="{{ old('password') }}">
@error('password')
<em>{{ $message}}</em>
@enderror
</div>
<div>
<label for="inputUserType">User Type</label>
<input type="text" name="user_type" id="inputUserType">

</div>
<div>
<button type="submit" name="ok">Save</button>
<button type="reset" name="cancel">Cancel</button>
</div>
</form>
@dd($errors)
@endsection