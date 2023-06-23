@extends('layouts.admintemplate')
@section('conteudo')
    <form action="{{ action([App\Http\Controllers\ColorController::class, 'update'], $color->code) }}" method="post">
        @method('PUT')
        <p></p>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $color->name }}" required>
        </div>

        <div class="form-group">
            <label for="code">Code</label>
            <input type="code" name="code" id="code" class="form-control" value="{{ $color->code }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <button class="btn btn-primary" onclick="window.history.back()">Cancel</button>
    </form>
@endsection
