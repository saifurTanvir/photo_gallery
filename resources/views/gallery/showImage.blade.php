<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Image</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>


    <div class="container">
        <h2 class="mb-5 mt-3">View Image</h2>

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


        <div class="row p-3">
            <div class="col-12">
                <img src="{{ asset($image->image_path) }}" alt="image" class="img-thumbnail mt-4">
                <div class="row p-3">
                    <div class="col"> 
                        <form action="{{route('gallery.image.update', $image->image_id)}}" method="post" enctype="multipart/form-data" class="form-inline">
                            @csrf
                            <input type="file" name="file">
                            <button class="btn btn-info" type="submit">Update</button>
                        </form>
                    </div>
                    <div class="col">
                        <form action="{{route('gallery.image.delete', $image->image_id)}}" method="post" enctype="multipart/form-data" class="form-inline">
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


</body>

</html>
