@extends('layouts.shopLayout')

@section('content')

<div class="container">
    <h2 class="mb-5 mt-3">Products</h2>
    <div class="row">
        <div class="col">
            <a href="{{ route('shop.manage.index', $shop->shop_id) }}"
                class="btn btn-success mb-3">Home</a>
        </div>
        <div class="col">
            <a href="{{ route('shop.manage.index', $shop->shop_id) }}"
                class="btn btn-success mb-3 float-right">Back</a>
        </div>
    </div>
    <div class="row no-gutters">

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
            </div>
        @endif

        <div class="row my-3 ml-2">

            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select
                    Category
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">Select Category</a></li>
                    @foreach($shop->company->category AS $category)
                        <li><a class="ml-2 w-50"
                                href="{{ route('shop.manage.product_list_by_category', [$shop->shop_id, $category->category_id]) }}">{{ $category->category_name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <form action="{{ route('shop.manage.search.product', $shop->shop_id) }}"
                method="post" class="form-inline">
                @csrf
                <div class="form-group">
                    <input type="text" name="product_name" class="form-control ml-3" placeholder="Search Product">
                </div>
                <button class="btn btn-info ml-3">Search by Product</button>
            </form>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Product Name</th>
                    <th>Shop Name</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Expire Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products AS $key => $product)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->shop->shop_name ?? '' }}</td>
                        <td>
                            @foreach($shop->company->category as $category)
                                @if(
                                    $category->category_id == $product->ref_category_id
                                    )

                                    {{ $category->category_name }}
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $product->product_stock }}</td>
                        <td>{{ $product->product_price }} @if($product->product_price)$ @endif</td>
                        <td>{{ $product->product_expire_date }}</td>
                        <td>
                            <a
                                href="{{ route('shop.manage.product.show', [$shop->shop_id, $product->product_id]) }}"><i
                                    data-toggle="tooltip" data-placement="bottom" title="Details"
                                    class="fas fa-info-circle"></i></a>
                            <a
                                href="{{ route('shop.manage.product.sale', [$shop->shop_id, $product->product_id]) }}"><i
                                    class="fas fa-cart-arrow-down"></i></a>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>




@endsection
