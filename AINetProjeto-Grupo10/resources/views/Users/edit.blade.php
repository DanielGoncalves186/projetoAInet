@extends('layouts.admintemplate')
@section('conteudo')
<form action="{{ action([App\Http\Controllers\UserController::class,'update'], $user->id) }}" method="post">
    @method('PUT')
<p></p>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <button class="btn btn-primary" onclick="window.history.back()">Cancel</button>
</form>

@endsection