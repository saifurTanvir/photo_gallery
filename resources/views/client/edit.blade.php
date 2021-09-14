<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Client</title>
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
        <h2 class="mb-5 mt-3">Edit Client</h2>

        <div>
            <a href="{{ route('client.index') }}" class="btn btn-success mb-3">Back</a>
            <a href="{{ route('client.index') }}" class="btn btn-success mb-3 float-right">Home</a>
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

        <form action="{{ route('client.update', [$client->client_id]) }}" method="post">
            @csrf

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="client_first_name">Fisrt name</label>
                        <input type="text" name="client_first_name" value="{{ $client->client_first_name }}"
                            class="form-control" placeholder="Nicola">
                    </div>

                    <div class="form-group">
                        <label for="client_gander">Gander</label>
                        <select class="form-control" name="client_gander">
                            <option disabled>Select</option>
                            <option value="Male" @if($client->client_gander == 'Male') selected @endif>Male</option>
                            <option value="Female" @if($client->client_gander == 'Female') selected @endif>Female
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="client_email">Email</label>
                        <input type="text" name="client_email" value="{{ $client->client_email }}"
                            class="form-control" placeholder="tesla@gmail.com">
                    </div>

                    <div class="form-group">
                        <label for="client_address">Address</label>
                        <textarea name="client_address" id="client_address" class="form-control"
                            placeholder="Dhaka, Bangladesh">{{ $client->client_address }}</textarea>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="client_last_name">Last name</label>
                        <input type="text" name="client_last_name" value="{{ $client->client_last_name }}"
                            class="form-control" placeholder="Tesla">
                    </div>

                    <div class="form-group">
                        <label for="client_age">Age</label>
                        <input type="number" name="client_age" value="{{ $client->client_age }}" class="form-control"
                            placeholder="32">
                    </div>

                    <div class="form-group">
                        <label for="client_phone">Phone</label>
                        <input type="text" name="client_phone" value="{{ $client->client_phone }}"
                            class="form-control" placeholder="2441139">
                    </div>

                    <div class="form-group">
                        <label for="client_status">Status</label>
                        <select class="form-control" name="client_status">
                            <option disabled>Select</option>
                            <option value="1" @if($client->client_status == 1) selected @endif
                                >Active</option>
                            <option value="0" @if($client->client_status == 0) selected @endif
                                >Inactive</option>
                        </select>
                    </div>

                </div>
            </div>

            <button type="submit" class="btn btn-info btn-block">Update</button>
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
