@extends('layouts.admintemplate')
@section('conteudo')
<form action="{{ action([App\Http\Controllers\CategoryController::class,'update'], $category->id) }}" method="post">
@csrf
@method("PUT")
<div>
<label for="inputName">Name</label>
<input type="text" name="name" id="inputName" value="{{ old('name', $category->name) }}">
@error('name')
<em>{{ $message }}</em>
@enderror
</div>
<div>
<button type="submit" name="ok">Save</button>
<button type="reset" name="cancel">Cancel</button>
</div>
</form>

@endsection
