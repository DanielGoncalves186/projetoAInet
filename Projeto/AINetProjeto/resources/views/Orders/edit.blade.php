<form action="{{ action([App\Http\Controllers\OrderController::class,'update'], $order->id) }}" method="post">
@csrf
@method("PUT")
<div>
<label for="Status">Status</label>
<input type="text" name="status" id="inputStatus" value="{{ old('status',$order->status) }}">
@error('status')
<em>{{ $message}}</em>
@enderror
</div>
<div>
<label for="notes">Notes</label>
<input type="text" name="notes" id="inputNotes" value="{{ old('notes',$order->notes) }}">
@error('notes')
<em>{{ $message}}</em>
@enderror
</div>
<div>
<label for="address">Address</label>
<input type="text" name="address" id="inputAddress" value="{{ old('address',$order->address) }}">
@error('address')
<em>{{ $message}}</em>
@enderror
</div>



<div>
<button type="submit" name="ok">Save</button>
<button type="reset" name="cancel">Cancel</button>
</div>
</form>

@dd($errors)
// need to update without the other parameters