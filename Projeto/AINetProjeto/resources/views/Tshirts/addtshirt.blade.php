@extends('layouts.app')

@section('content')
    <p></p>
    <div class="container">
        <h2>Add T-Shirt</h2>

        <form action="{{ route('tshirt.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="customer_id">Customer ID:</label>
                <input type="text" class="form-control" value="{{ Auth::id() }}" readonly>
            </div>

            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="image_url">Image URL:</label>
                <input type="text" name="image_url" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
@endsection
