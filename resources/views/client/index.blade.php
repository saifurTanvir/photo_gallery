<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clients</title>
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


    <div class="container">
        <h2 class="mb-5 mt-3">Clients</h2>
        <div class="row">
            <div class="col">
                <a href="{{ route('client.create') }}" class="btn btn-secondary mb-3 ml-4">Add
                    Client</a>

                <a href="#" class="btn btn-secondary mb-3 float-right">Logout</a>
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
                        <th>Name</th>
                        <th>Address</th>
                        <th>Gander</th>
                        <th>Age</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients AS $key => $client)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $client->client_first_name }} {{ $client->client_last_name }}</td>
                            <td>{!! $client->client_address !!}</td>
                            <td>{{ $client->client_gander }}</td>
                            <td>{{ $client->client_age }}</td>
                            <td>{{ $client->client_phone }}</td>
                            <td><i data-toggle="tooltip" data-placement="bottom" title="Show Detail"
                                    class="fas fa-info-circle"></i> <i data-toggle="tooltip" data-placement="bottom"
                                    title="Edit" class="fas fa-edit"></i> <i data-toggle="tooltip"
                                    data-placement="bottom" title="Delete" class="fas fa-trash-alt"></i> <i
                                    data-toggle="tooltip" data-placement="bottom" title="Active/Inactive"
                                    class="fas fa-toggle-on"></i></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>




</body>

</html>
