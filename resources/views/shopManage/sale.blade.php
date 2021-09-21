@extends('layouts.shopLayout')
@section('content')

<div class="container">
    <h2 class="mb-5 mt-3">Product Sale</h2>

    @if(session('error'))
        <div class="mt-5">
            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    @if(session('success'))
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <button class="btn btn-success btn-block mb-3" onclick="window.print()">Print Sale Document</button>
        </div>
    @endif

    <form
        action="{{ route('shop.manage.product.sale', [$shop->shop_id, $product->product_id]) }}"
        method="post">
        @csrf

        <div class="row">
            <div class="row">
                @foreach($product->productImage AS $image)
                    <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <img src="{{ asset($image->attachment_url) }}" class="img-fluid" alt="images">
                    </div>
                @endforeach
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="product_name">Product Name </label>
                    <input type="text" value="{{ $product->product_name }}" class="form-control"
                        placeholder="Matador Orbit" disabled="true">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="product_price">Price($)</label>
                    <input type="number" value="{{ $product->product_price }}" class="form-control" placeholder="250"
                        disabled="true">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group">
                    <label for="product_detail">Details</label>
                    <textarea id="product_detail" class="form-control"
                        placeholder="This product is"> {{ $product->product_detail }}</textarea>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                <div class="form-group">
                    <label for="product_name">Quantity </label>
                    <input type="number" name="product_quantity" class="form-control" placeholder="2">
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                <div class="form-group">
                    <label for="product_name">Total Price ($)</label>
                    <input type="number" name="product_price" value="{{ $product->product_price }}"
                        class="form-control" placeholder="2" disabled>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <label for="">Payment Method</label>
                <div class="form-check form-check-inline ml-5">
                    <input class="form-check-input" type="radio" name="payment_method" value="1">
                    <label class="form-check-label" for="inlineRadio1">Cash</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_method" value="2">
                    <label class="form-check-label" for="inlineRadio2">Bkash</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_method" value="3">
                    <label class="form-check-label" for="inlineRadio3">Card</label>
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-info btn-block mt-3">Checkout</button>
    </form>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#product_detail'))
        .catch(error => {
            console.error(error);
        });

</script>

@endsection
