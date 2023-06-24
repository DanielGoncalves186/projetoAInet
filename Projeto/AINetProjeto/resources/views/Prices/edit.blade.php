@extends('layouts.admintemplate')

@section('conteudo')
    <form action="{{ action([App\Http\Controllers\PriceController::class, 'update'], $price->id) }}" method="post">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="unit_price_catalog">Unit_price_catalog</label>
            <input type="text" name="unit_price_catalog" id="unit_price_catalog" class="form-control"
                value="{{ $price->unit_price_catalog }}" required>
        </div>
        <div class="form-group">
            <label for="unit_price_own">Unit_price_own</label>
            <input type="text" name="unit_price_own" id="unit_price_own" class="form-control"
                value="{{ $price->unit_price_own }}" required>
        </div>
        <div class="form-group">
            <label for="unit_price_own_discount">Unit_price_own_discount</label>
            <input type="text" name="unit_price_own_discount" id="unit_price_own_discount" class="form-control"
                value="{{ $price->unit_price_own_discount }}" required>
        </div>
        <div class="form-group">
            <label for="qty_discount">Qty_discount</label>
            <input type="text" name="qty_discount" id="qty_discount" class="form-control"
                value="{{ $price->qty_discount }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn btn-primary" href="{{ route('prices.index') }}">Cancel</a>
    </form>
@endsection
