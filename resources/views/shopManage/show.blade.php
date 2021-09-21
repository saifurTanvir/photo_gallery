@extends('layouts.shopLayout')

@section('content')


<div class="container">
    <h2 class="mb-5 mt-3">Show Product</h2>

    <div>
        <a href="{{ route('shop.manage.product', $shop->shop_id) }}"
            class="btn btn-success mb-3">Home</a>
        <a href="{{ route('shop.manage.product', $shop->shop_id) }}"
            class="btn btn-success mb-3 float-right">Back</a>
    </div>



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

    <div class="row">
        <div class="col_8 col-md-8 col-lg-8">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Product Name</th>
                        <td>{{ $product->product_name }}</td>

                    </tr>
                    <tr>
                        <th>Product Size</th>
                        <td>{{ $product->product_size }}</td>

                    </tr>
                    <tr>
                        <th>Product Weight(g)</th>
                        <td>{{ $product->product_weight }}</td>

                    </tr>
                    <tr>
                        <th>Category</th>
                        <td>
                            @foreach($product->company->category as $category)
                                @if(
                                    $category->category_id == $product->ref_category_id
                                    )

                                    {{ $category->category_name }}
                                @endif
                            @endforeach
                        </td>

                    </tr>
                    <tr>
                        <th>Parent Category</th>
                        <td>
                            @foreach($product->company->category as $category)
                                @if(
                                    $category->category_id == $product->ref_parent_category_id
                                    )

                                    {{ $category->category_name }}
                                @endif
                            @endforeach
                        </td>

                    </tr>
                    <tr>
                        <th>Height(cm)</th>
                        <td>{{ $product->product_height }}</td>

                    </tr>
                    <tr>
                        <th>Width(cm)</th>
                        <td>{{ $product->product_width }}</td>

                    </tr>
                    <tr>
                        <th>Warenty</th>
                        <td>{{ $product->product_warenty }}</td>

                    </tr>
                    <tr>
                        <th>Price($)</th>
                        <td>{{ $product->product_price }}</td>

                    </tr>
                    <tr>
                        <th>Stock</th>
                        <td>{{ $product->product_stock }}</td>

                    </tr>
                    <tr>
                        <th>Creation Date</th>
                        <td>{{ $product->product_creation_date }}</td>

                    </tr>
                    <tr>
                        <th>Expire Date</th>
                        <td>{{ $product->product_expire_date }}</td>

                    </tr>
                    <tr>
                        <th>Quality</th>
                        <td>{{ $product->product_quality }}</td>

                    </tr>
                    <tr>
                        <th>Manufacturer Name</th>
                        <td>{{ $product->product_manufacturer_name }}</td>

                    </tr>
                    <tr>
                        <th>Manufacturing Place</th>
                        <td>{{ $product->product_manufacturer_place }}</td>

                    </tr>
                    <tr>
                        <th>Product Details</th>
                        <td>{!! $product->product_detail !!}</td>

                    </tr>
                </tbody>

            </table>

            @if(count($product->productImage))
                <h2 class="my-3 text-info">Product Images</h2>
            @endif

            <div class="row mb-5">
                @foreach($product->productImage AS $image)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <img src="{{ asset($image->attachment_url) }}" class="img-fluid" alt="images">
                    </div>
                @endforeach
            </div>

        </div>


    </div>




</div>

<script>
    ClassicEditor
        .create(document.querySelector('#product_detail'))
        .catch(error => {
            console.error(error);
        });

</script>

@endsection
