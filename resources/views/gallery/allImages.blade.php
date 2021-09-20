<!DOCTYPE html>
<html lang="en">

<head>
    <title>Photo Gallery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>


    <div class="container">
        <h2 class="mb-5 mt-3">Photos</h2>

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

        <div class="row my-3 ml-3">
            <form action="{{ route('gallery.store_image', [$gallery_id]) }}" method="post"
                enctype="multipart/form-data" class="form-inline">
                @csrf

                <div class="form-group">
                    <label for="title" class="text-bold">Write Description</label>
                    <input type="text" name="description" multiple class="form-control ml-3"
                        placeholder="description...">
                </div> 

                <div class="form-group ml-5">
                    <label for="file" class="text-bold">Upload photo</label>
                    <input type="file" name="images[]" multiple class="form-control ml-3">
                </div>
                <button type="submit" class="btn btn-primary ml-3">Upload</button>
            </form>
        </div>


        <div class="row p-3">
            @foreach($images AS $image)
                <div class="col-6 col-md-3 col-lg-3">
                    <figure>
                        <a href="{{ route('gallery.image.show', $image->image_id) }}">
                            <img src="{{ asset($image->image_path) }}" alt="image" class="img-thumbnail mt-4">
                        </a>
                    </figure>
                </div>
            @endforeach

        </div>
    </div>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body" id="image">
                </div>


            </div>
        </div>
    </div>


</body>

</html>
