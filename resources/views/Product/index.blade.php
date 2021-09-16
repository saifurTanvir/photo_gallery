<!DOCTYPE html>
<html lang="en">

<head>
    <title>Products</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <style>
        a {
            color: #000000;
            text-decoration: none;
        }

    </style>


    <div class="container">
        <h2 class="mb-5 mt-3">Products</h2>
        <div class="row">
            <div class="col">
                <a href="{{ route('product.create', $company->company_id) }}"
                    class="btn btn-success mb-3">Add
                    Product</a>

                <a href="{{ route('product.index', $company->company_id) }}"
                    class="btn btn-success mb-3 float-right">Home</a>
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

            <div class="row my-3">
                <div class="col">
                    <form
                        action="{{ route('product.search.shop_name', $company->company_id) }}"
                        method="post">
                        @csrf
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <select class="form-control" name="ref_shop_id">
                                    <option selected disabled value="">Select Shop</option>
                                    @foreach($company->shop AS $shop)
                                        <option value="{{ $shop->shop_id }}">{{ $shop->shop_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-info btn-block">Search by Shopname</button>
                    </form>
                </div>
                <div class="col">
                    <form
                        action="{{ route('product.search.category', $company->company_id) }}"
                        method="post">
                        @csrf
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <select class="form-control" name="ref_category_id">
                                    <option selected disabled value="">Select Category</option>
                                    @foreach($company->category AS $category)
                                        <option value="{{ $category->category_id }}">{{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-info ml-3 btn-block">Search by Subcategory</button>
                    </form>
                </div>
                <div class="col">
                    <form
                        action="{{ route('product.search.subcategory', $company->company_id) }}"
                        method="post">
                        @csrf
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <select class="form-control" name="ref_parent_category_id">
                                    <option selected disabled value="">Select Subcategory</option>
                                    @foreach($company->category AS $category)
                                        <option value="{{ $category->category_id }}">{{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-info ml-3 btn-block">Search by Subcategory</button>
                    </form>
                </div>
                <div class="col">
                    <form
                        action="{{ route('product.search.product_name', $company->company_id) }}"
                        method="post">
                        @csrf
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <input type="text" name="product_name" class="form-control"
                                    placeholder="Search Product">
                            </div>
                        </div>
                        <button class="btn btn-info ml-3 btn-block">Search by Product</button>
                    </form>
                </div>
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
                                @foreach($company->category as $category)
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
                                    href="{{ route('product.show', [$product->product_id]) }}"><i
                                        data-toggle="tooltip" data-placement="bottom" title="Details"
                                        class="fas fa-info-circle"></i></a>
                                <a
                                    href="{{ route('product.edit', [$product->product_id]) }}"><i
                                        data-toggle="tooltip" data-placement="bottom" title="Edit"
                                        class="fas fa-edit"></i></a>
                                <a href="{{ route('product.delete', [$product->product_id]) }}"
                                    onclick="return confirm('Are you sure, you want to delete all information of this product?')"><i
                                        data-toggle="tooltip" data-placement="bottom" title="Delete"
                                        class="fas fa-trash-alt"></i></a>

                                @if($product->product_active)
                                    <a href="{{ route('product.make_inactive', [$product->product_id]) }}"
                                        onclick="return confirm('Are you sure, you want inactive?')"><i
                                            data-toggle="tooltip" data-placement="bottom" title="make inactive"
                                            class="fas fa-toggle-on"></i></a>
                                @else
                                    <a href="{{ route('product.make_active', [$product->product_id]) }}"
                                        onclick="return confirm('Are you sure, you want active?')"><i
                                            data-toggle="tooltip" data-placement="bottom" title="make active"
                                            class="fas fa-toggle-off"></i></a>
                                @endif





                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>




</body>

</html>
