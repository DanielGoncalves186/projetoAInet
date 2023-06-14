@extends('template')
@section('content')
<form action="{{ action([App\Http\Controllers\OrderController::class,'store']) }}" method="post">
@csrf
<div>
<label for="inputNif">NIF</label>
<input type="text" name="nif" id="inputNif" value="{{ old('nif') }}">
@error('nif')
<em>{{ $message}}</em>
@enderror
</div>

<div>
<label for="inputAddress">Address</label>
<input type="text" name="address" id="inputAddress" value="{{ old('address') }}">
@error('address')
<em>{{ $message}}</em>
@enderror
</div>

<div>
<label for="inputPaymentType">default payment type</label>
<input type="text" name="default_payment_type" id="inputPaymentType" value="{{ old('default_payment_type') }}">
@error('default_payment_type')
<em>{{ $message}}</em>
@enderror
</div>

<div>
<label for="inputPaymentRef">default payment ref</label>
<input type="text" name="default_payment_ref" id="inputPaymentRef" value="{{ old('default_payment_ref') }}">
@error('default_payment_ref')
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