@extends('layouts.admintemplate')
@section('conteudo')
<form action="{{ action([App\Http\Controllers\CustomerController::class,'update'], $customer->id) }}" method="post">
@csrf
@method("PUT")
<div class="form-group">
<label for="inputNif">NIF</label>
<input type="text" class="form-control" name ="inputNif"placeholder="NIF" pattern="[0-9]{9}" title="Enter a 9-digit NIF" value="{{ old('nif',$customer->nif) }}">

@error('nif')
<em>{{ $message}}</em>
@enderror
</div>
<div class="form-group">
  <label for="inputAddress">Address</label>
  <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Enter address" value="{{ old('address',$customer->address) }}">
@error('address')
<em>{{ $message}}</em>
@enderror
</div>

<div class="form-group">
<label for="inputPaymentType">Payment Type</label>
  <select class="form-control" id="inputPaymentType">
    <option value="MASTERCARD">Master Card</option>
    <option value="VISA">Visa</option>
    <option value="PAYPAL">PayPal</option>
    </select>
@error('default_payment_type')
<em>{{ $message}}</em>
@enderror
</div>
<div class="form-group">
  <label for="inputPaymentRef">Payment Reference</label>
  <input type="text" name="default_payment_ref" id="inputPaymentRef" class="form-control" id="payment-reference" placeholder="Enter payment reference" value="{{ old('default_payment_ref',$customer->default_payment_ref) }}">
</div>
@error('default_payment_ref')
<em>{{ $message}}</em>
@enderror
<div>
<button class="btn btn-primary" type="submit">Save</button>
<button class="btn btn-primary" onclick="window.history.back()">Cancel</button>
</div>
</form>
@endsection
