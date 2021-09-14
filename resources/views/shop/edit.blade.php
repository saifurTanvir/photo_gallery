<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Shop</title>
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
        <h2 class="mb-5 mt-3">Edit Shop</h2>

        <div>
            <a href="{{ route('shop.index') }}" class="btn btn-success mb-3">Home</a>
            <a href="{{ route('shop.index') }}" class="btn btn-success mb-3 float-right">Back</a>
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

        {{-- <i class="fas fa-star-of-life fa-sm text-danger"></i> --}}
        <form action="{{ route('shop.update', $shop->shop_id) }}" method="post"
            enctype="multipart/form-data">
            @csrf

            <div class="row my-3">
                <div class="col-8">
                    <div class="form-group">
                        <label for="shop_name">Shop Name</label>
                        <input type="text" name="shop_name" value="{{ $shop->shop_name }}" class="form-control"
                            placeholder="Shop 1">
                    </div>

                    <div class="form-group">
                        <label for="shop_phone">Phone</label>
                        <input type="text" name="shop_phone" value="{{ $shop->shop_phone }}" class="form-control"
                            placeholder="02568 256263">
                    </div>

                    <div class="form-group">
                        <label for="shop_email">Email</label>
                        <input type="text" name="shop_email" value="{{ $shop->shop_email }}" class="form-control"
                            placeholder="shop@gmail.com">
                    </div>

                    <div class="form-group">
                        <label for="shop_location">Location</label>
                        <textarea name="shop_location" class="form-control" id="shop_location"
                            value="{{ $shop->shop_location }}"
                            placeholder="Notun Bazar, Dhaka, Bangladesh"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="re_company_id">Company Name</label>
                        <select class="form-control" name="ref_company_id">
                            <option disabled selected>Select Company</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->company_id }}" @if($shop->ref_company_id ==
                                    $company->company_id) selected @endif>{{ $company->company_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="shop_active">Shop Status</label>
                        <select class="form-control" name="shop_active">
                            <option disabled selected>Select Staus</option>
                            <option value="1" @if($shop->shop_status == 1) selected @endif>Active</option>
                            <option value="0" @if($shop->shop_status == 0) selected @endif>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-info btn-block">Create</button>
                </div>
            </div>

        </form>
    </div>
</body>

</html>
