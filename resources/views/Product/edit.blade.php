<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Product</title>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>


    <div class="container">
        <h2 class="mb-5 mt-3">Edit Product</h2>

        <div>
            <a href="{{ route('product.index') }}" class="btn btn-success mb-3">Back</a>
            <a href="{{ route('product.index') }}" class="btn btn-success mb-3 float-right">Logout</a>
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

        <form action="{{ route('product.update', [$product->product_id]) }}"
            method="post">
            @csrf

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="product_name">Product Name </label>
                        <input type="text" name="product_name" value="{{ $product->product_name }}"
                            class="form-control" placeholder="Matador Orbit">
                    </div>

                    <div class="form-group">
                        <label for="ref_category_id">Category</label>
                        <select class="form-control" name="ref_category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                            @endforeach
                            <option disabled>Select</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="product_height">Height(cm)</label>
                        <input type="number" name="product_height" value="{{ $product->product_height }}"
                            class="form-control" placeholder="5.2">
                    </div>

                    <div class="form-group">
                        <label for="product_size">Size</label>
                        <input type="text" name="product_size" value="{{ $product->product_size }}"
                            class="form-control" placeholder="XXL">
                    </div>

                    <div class="form-group">
                        <label for="product_creation_date">Creation Date</label>
                        <input type="date" name="product_creation_date" value="{{ $product->product_creation_date }}"
                            class="form-control" placeholder="05-12-2020">
                    </div>

                    <div class="form-group">
                        <label for="product_warranty">Warranty</label>
                        <input type="date" name="product_warranty" value="{{ $product->product_warranty }}"
                            class="form-control" placeholder="31-12-23">
                    </div>

                    <div class="form-group">
                        <label for="product_manufacture_place">Manufacturing Place</label>
                        <input type="text" name="product_manufacture_place"
                            value="{{ $product->product_manufacture_place }}" class="form-control"
                            placeholder="Dhaka">
                    </div>

                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="product_weight">Product Weight(g) </label>
                        <input type="number" name="product_weight" value="{{ $product->product_weight }}"
                            class="form-control" placeholder="57">
                    </div>

                    <div class="form-group">
                        <label for="ref_subcategory_id">Subcategory</label>
                        <select class="form-control" name="ref_subcategory_id">
                            @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->subcategory_id }}">
                                    {{ $subcategory->subcategory_name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="product_widht">Width(cm)</label>
                        <input type="number" name="product_widht" value="{{ $product->product_widht }}"
                            class="form-control" placeholder="5.2">
                    </div>

                    <div class="form-group">
                        <label for="product_price">Price($)</label>
                        <input type="number" name="product_price" value="{{ $product->product_price }}"
                            class="form-control" placeholder="250">
                    </div>

                    <div class="form-group">
                        <label for="product_expaire_date">Expire Date</label>
                        <input type="date" name="product_expaire_date" value="{{ $product->product_expaire_date }}"
                            class="form-control" placeholder="31-12-23">
                    </div>

                    <div class="form-group">
                        <label for="product_quality">Quality</label>
                        <input type="text" name="product_quality" value="{{ $product->product_quality }}"
                            class="form-control" placeholder="Best">
                    </div>

                    <div class="form-group">
                        <label for="product_manufacturer_name">Manufacturer Name</label>
                        <input type="text" name="product_manufacturer_name"
                            value="{{ $product->product_manufacturer_name }}" class="form-control"
                            placeholder="Arong">
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="product_detail">Details</label>
                        <textarea name="product_detail" value="{{ $product->product_detail }}" id="product_detail"
                            class="form-control" placeholder="This product is"> </textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-info btn-block">Update</button>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#product_detail'))
            .catch(error => {
                console.error(error);
            });

    </script>

</body>

</html>
