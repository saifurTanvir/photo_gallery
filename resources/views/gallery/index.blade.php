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
        <h2 class="mb-5 mt-3">Photo Gallery</h2>
        <div class="row">
            <div class="col">
                <a href="{{ route('gallery.create') }}" class="btn btn-secondary mb-3 ml-4">Create
                    Galary</a>

                <a href="#" class="btn btn-secondary mb-3 float-right">Logout</a>
            </div>
        </div>
        <div class="row no-gutters">
            @foreach($galleries AS $gallery)
                <a href="{{ route('gallery.allImages', [$gallery->gallery_id]) }}"
                    class="col-3 col-md-3 col-lg-3 bg-info ml-4 mt-4" style="text-decoration: none !important">
                    <h5 class="text-light ml-3 mt-3 text-bold">{{ $gallery->gallery_title }}</h5>
                    <div class="text-light mt-3 ml-4">
                        <p class="">{!! $gallery->gallery_description !!}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>




</body>

</html>
