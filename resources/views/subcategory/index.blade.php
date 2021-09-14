<!DOCTYPE html>
<html lang="en">

<head>
    <title>Subcategories</title>
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
        <h2 class="mb-5 mt-3">Subcategories</h2>
        <div class="row">
            <div class="col">
                <a href="{{ route('client.create') }}" class="btn btn-info mb-3 ml-4">Add
                    Subcategory</a>

                <a href="#" class="btn btn-info mb-3 float-right">Back</a>
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

            <table class="table table-striped ml-4">
                <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Subcategry Name</th>
                        <th>Categry Name</th>
                        <th>Company Name</th>
                        <th>Creation Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subcategories AS $key => $subcategory)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $subcategory->subcategory_name }} </td>
                            <td>{{ $subcategory->category->category_name }} </td>
                            <td>{{ $subcategory->company->company_name }}</td>
                            <td>{{ $subcategory->subcategory_created_at }}</td>
                            <td>
                                <a href="">
                                    <i data-toggle="tooltip" data-placement="bottom" title="Edit"
                                        class="fas fa-edit"></i>
                                </a>

                                <a href="" onclick="return confirm('Are you sure, you want to delete this client?')"><i
                                        data-toggle="tooltip" data-placement="bottom" title="Delete"
                                        class="fas fa-trash-alt"></i></a>
                                @if($subcategory->subcategory_active)
                                    <a href="" onclick="return confirm('Are you sure, you want inactive?')"><i
                                            data-toggle="tooltip" data-placement="bottom" title="make inactive"
                                            class="fas fa-toggle-on"></i></a>
                                @else
                                    <a href="" onclick="return confirm('Are you sure, you want active?')"><i
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
