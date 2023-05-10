@extends('template')
@section('content')
<form action="{{ action([App\Http\Controllers\CategoryController::class,'store']) }}" method="post">
@csrf
<div>
<label for="inputName">Name</label>
<input type="text" name="name" id="inputName" value="{{ old('name') }}">
@error('name')
<em>{{ $message}}</em>
@enderror
</div>
<div>
<button type="submit" name="ok">Save</button>
<button type="reset" name="cancel">Cancel</button>
</div>
</form>
@dd($errors)
@endsection