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
                <a href="{{ route('product.create') }}" class="btn btn-info mb-3 ml-4">Add
                    Product</a>

                <a href="{{ route('product.index') }}" class="btn btn-info mb-3 float-right">Home</a>
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

            <form action="{{ route('product.search') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group ml-4">
                            <select class="form-control" name="ref_shop_id">
                                <option selected disabled value="">Select Shop</option>
                                <option>Shop A</option>
                                <option>Shop B</option>
                                <option>Shop C</option>
                                <option>Shop D</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group ml-4">
                            <select class="form-control" name="ref_category_id">
                                <option selected disabled value="">Select Category</option>
                                <option>Category A</option>
                                <option>Category B</option>
                                <option>Category C</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group ml-4">
                            <select class="form-control" name="ref_subcategory_id">
                                <option selected disabled value="">Select Subcategory</option>
                                <option>Subcategory A</option>
                                <option>Subcategory B</option>
                                <option>Subcategory C</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                        <input type="text" name="product_name" class="form-control ml-4" placeholder="Search Product">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <button class="btn btn-block btn-success ml-4 mb-3">Search
                            Product</button>
                    </div>
                </div>
            </form>

            <table class="table table-striped ml-4">
                <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products AS $key => $product)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>
                                @foreach($categories as $category)
                                    @if(
                                        $category->category_id == $product->ref_category_id
                                        )

                                        {{ $category->category_name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($subcategories as $subcategory)
                                    @if(
                                        $subcategory->subcategory_id == $product->ref_subcategory_id
                                        )

                                        {{ $subcategory->subcategory_name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $product->product_quantity }}</td>
                            <td>{{ $product->product_price }} $</td>
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
                                            class="fas fa-toggle-off"></i></a>
                                @else
                                    <a href="{{ route('product.make_active', [$product->product_id]) }}"
                                        onclick="return confirm('Are you sure, you want active?')"><i
                                            data-toggle="tooltip" data-placement="bottom" title="make active"
                                            class="fas fa-toggle-on"></i></a>
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
