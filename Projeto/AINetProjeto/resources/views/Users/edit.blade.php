<form action="{{ action([App\Http\Controllers\UserController::class,
'update'], $user->id) }}" method="post">
@csrf
@method("PUT")
<div>
<label for="inputName">Name</label>
<input type="text" name="name" id="inputName" value="{{ old('name', $user->name) }}">
@error('name')
<em>{{ $message }}</em>
@enderror
</div>
<div>
<label for="inputEmail">Email</label>
<input type="text" name="email" id="inputEmail" value="{{ old('email', $user->email) }}">
@error('email')
<em>{{ $message }}</em>
@enderror
</div>
<div>
<label for="inputPassword">Password</label>
<input type="password" name="password" id="inputPassword">
@error('password')
<em>{{ $message }}</em>
@enderror
</div>
<div>
<label for="inputPasswordConfirm">Password Confirm</label>
<input type="password" name="password_confirm" id="inputPasswordConfirm">
@error('password_Confirm')
<em>{{ $message }}</em>
@enderror
</div>
<div>
<button type="submit" name="ok">Save</button>
<button type="reset" name="cancel">Cancel</button>
</div>
</form>

@dd($errors)