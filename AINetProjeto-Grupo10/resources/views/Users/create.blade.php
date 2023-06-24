@extends('layouts.admintemplate')
@section('conteudo')
<form action="{{ action([App\Http\Controllers\UserController::class,
'store']) }}" method="post">

<p> </p>
<div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="user_type">User Type</label>
        <select name="user_type" id="user_type" class="form-control" required>
            <option value="client">Client</option>
            <option value="user">User</option>
        </select>
    </div>
<div>
<button type="submit" class="btn btn-primary">Create User</button>
</form>
</div>
</form>

@endsection
