<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Client</title>
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
        <h2 class="mb-5 mt-3">Add Client</h2>

        <div>
            <a href="{{ route('client.index') }}" class="btn btn-success mb-3">Back</a>
            <a href="{{ route('client.index') }}" class="btn btn-success mb-3 float-right">Logout</a>
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


        <form action="{{ route('client.store') }}" method="post">
            @csrf

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="client_first_name">Firstname <i
                                class="fas fa-star-of-life fa-sm text-danger"></i></label>
                        <input type="text" name="client_first_name"
                            value="{{ old('client_first_name') }}" class="form-control"
                            placeholder="John">
                    </div>

                    <div class="form-group">
                        <label for="client_gander">Gander <i class="fas fa-star-of-life fa-sm text-danger"></i></label>
                        <select class="form-control" name="client_gander">
                            <option disabled>Select</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="client_phone">phone <i class="fas fa-star-of-life fa-sm text-danger"></i></label>
                        <input type="text" value="{{ old('client_phone') }}" name="client_phone"
                            class="form-control" placeholder="01685 256836..">
                    </div>

                    <div class="form-group">
                        <label for="ref_user_type_id">Type <i class="fas fa-star-of-life fa-sm text-danger"></i></label>
                        <select class="form-control" name="ref_user_type_id">
                            <option disabled>Select</option>
                            <option value="1">Admin</option>
                            <option value="0">Client</option>
                        </select>
                    </div>


                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="client_last_name">Lastname</label>
                        <input type="text" value="{{ old('client_last_name') }}"
                            name="client_last_name" class="form-control" placeholder="Doe">
                    </div>

                    <div class="form-group">
                        <label for="client_age">Age <i class="fas fa-star-of-life fa-sm text-danger"></i></label>
                        <input type="text" value="{{ old('client_age') }}" name="client_age"
                            class="form-control" placeholder="25">
                    </div>

                    <div class="form-group">
                        <label for="client_email">Email</label>
                        <input type="email" value="{{ old('client_first_name') }}" name="client_email"
                            class="form-control" placeholder="example@gmail.com">
                    </div>

                    <div class="form-group">
                        <label for="client_status">Status <i class="fas fa-star-of-life fa-sm text-danger"></i></label>
                        <select class="form-control" name="client_status">
                            <option disabled>Select</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="client_address">Address</label>
                        <textarea name="client_address" value="{{ old('client_address') }}"
                            id="client_address" class="form-control" placeholder="New York .."> </textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-info btn-block">Create</button>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#client_address'))
            .catch(error => {
                console.error(error);
            });

    </script>

</body>

</html>
