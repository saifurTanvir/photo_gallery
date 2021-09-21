@extends('layouts.shopLayout')
@section('content')



<div class="container">
    <h3>{{ $shop->shop_name }}</h3>

    <div class="card-deck my-3">
        <div class="card bg-primary">
            <div class="card-body text-center">
                <h4 class="card-text text-bold">Total Number of Sale</h4>
                <h2 class="card-text">243</h2>
            </div>
        </div>
        <div class="card bg-warning">
            <div class="card-body text-center">
                <h4 class="card-text">Total Number of Category</h4>
                <h2 class="card-text">{{ count($shop->company->category) }}</h2>
            </div>
        </div>
        <div class="card bg-info">
            <div class="card-body text-center">
                <h4 class="card-text">Total Number of Product</h4>
                <h2 class="card-text">{{ count($shop->product) }}</h2>
            </div>
        </div>
    </div>

</div>

@endsection
