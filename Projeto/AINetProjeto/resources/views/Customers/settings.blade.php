@extends('layouts.clientetemplate')
@section('conteudo')
<form action="{{ action([App\Http\Controllers\CustomerController::class,'storeUpdate'], $customer->id) }}" method="post">
    @csrf
    @method('PUT')
   
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
    </div>
    @error('name')
    <em>{{ $message}}</em>
    @enderror

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" value="{{ $user->email}}" required>
    </div>
    @error('email')
    <em>{{ $message}}</em>
    @enderror
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <div class="form-group">
        <label for="photo">Photo:</label>
        <input type="file" class="form-control-file" name="photo">
    </div>
    <div class="form-group">
        <label for="nif">NIF:</label>
        <input type="text" class="form-control" name="nif" value="{{ $customer->nif }}">
    </div>
    @error('nif')
    <em>{{ $message}}</em>
    @enderror

    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" name="address" value="{{ $customer->address }}">
    </div>
    @error('address')
    <em>{{ $message}}</em>
    @enderror

    <div class="form-group">
        <label for="payment_type">Payment Type:</label>
        <select class="form-control" name="payment_type">
            <option value="VISA" {{ $customer->payment_type == 'VISA' ? 'selected' : '' }}>VISA</option>
            <option value="MC" {{ $customer->payment_type == 'MASTERCARD' ? 'selected' : '' }}>MASTERCARD</option>
            <option value="PAYPAL" {{ $customer->payment_type == 'PAYPAL' ? 'selected' : '' }}>PAYPAL</option>
        </select>
    </div>

    <div class="form-group">
        <label for="payment_reference">Payment Reference:</label>
        <input type="text" class="form-control" name="payment_ref" value="{{ $customer->payment_ref }}">
    </div>
    @error('payment_ref')
    <em>{{ $message}}</em>
    @enderror

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection