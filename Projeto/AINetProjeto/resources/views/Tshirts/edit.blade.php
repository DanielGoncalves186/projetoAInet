@extends('layouts.admintemplate')
@section('conteudo')
    <form action="{{ action([App\Http\Controllers\TshirtController::class, 'update'], $tshirt->id) }}" method="post">
        @method('PUT')
        <p></p>
        <div class="form-group">
            <label for="category_id">Category id</label>
            <input type="text" name="category_id" id="category_id" class="form-control" value="{{ $tshirt->category_id }}"
                required>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $tshirt->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control"
                value="{{ $tshirt->description }}" required>
        </div>

        <div class="form-group">
            <label for="description">Image url</label>
            <input type="text" name="image_url" id="image_url" class="form-control" value="{{ $tshirt->image_url }}"
                required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <button class="btn btn-primary" onclick="window.history.back()">Cancel</button>
    </form>
@endsection
