<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Category</title>
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
        <h2 class="mb-5 mt-3">Add Category</h2>

        <div>
            <a href="{{ route('category.index', $company_id) }}"
                class="btn btn-success mb-3">Home</a>
            <a href="{{ route('category.index', $company_id) }}"
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

        {{-- <i class="fas fa-star-of-life fa-sm text-danger"></i> --}}
        <form action="{{ route('category.store', $company_id) }}" method="post"
            enctype="multipart/form-data">
            @csrf

            <div class="row my-3">
                <div class="col-8">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" name="category_name" value="{{ old('category_name') }}"
                            class="form-control" placeholder="Cutton">
                    </div>

                    <div class="form-group">
                        <label for="ref_parent_id">Parent Category</label>
                        <select class="form-control" name="ref_parent_id">
                            <option disabled selected>Select Parent</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="re_company_id">Company Name</label>
                        <select class="form-control" name="ref_company_id">
                            <option disabled selected>Select Company</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->company_id }}">{{ $company->company_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="category_status">Category Status</label>
                        <select class="form-control" name="category_active">
                            <option disabled selected>Select Staus</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-info btn-block">Create</button>
                </div>
            </div>

        </form>
    </div>
</body>

</html>
