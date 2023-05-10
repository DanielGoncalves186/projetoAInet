<form action="{{ action([App\Http\Controllers\CustomerController::class,'update'], $customer->id) }}" method="post">
@csrf
@method("PUT")
<div>
<label for="inputNif">NIF</label>
<input type="text" name="nif" id="inputNif" value="{{ old('nif',$customer->nif) }}">
@error('nif')
<em>{{ $message}}</em>
@enderror
</div>

<div>
<label for="inputAddress">Address</label>
<input type="text" name="address" id="inputAddress" value="{{ old('address',$customer->address) }}">
@error('address')
<em>{{ $message}}</em>
@enderror
</div>

<div>
<label for="inputPaymentType">Payment Type</label>
<input type="text" name="default_payment_type" id="inputPaymentType" value="{{ old('default_payment_type',$customer->default_payment_type) }}">
@error('default_payment_type')
<em>{{ $message}}</em>
@enderror
</div>

<div>
<label for="inputPaymentRef">Payment Ref</label>
<input type="text" name="default_payment_ref" id="inputPaymentRef" value="{{ old('default_payment_ref',$customer->default_payment_ref) }}">
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