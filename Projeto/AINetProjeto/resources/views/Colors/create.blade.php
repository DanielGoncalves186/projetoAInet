@extends('layouts.admintemplate')
@section('conteudo')
    <form action="{{ action([App\Http\Controllers\ColorController::class, 'store']) }}" method="post">

        <p> </p>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="code">Code</label>
            <input type="code" name="code" id="code" class="form-control" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Create Color</button>
    </form>
    </div>
    </form>
@endsection
