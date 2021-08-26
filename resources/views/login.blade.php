<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title>BIG DATA LOGIN PAGE</title>
    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('public/js/app.js') }}"></script>


    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            background: #dcecf2 !important;
        }

        .user_card {
            height: 60%;
            width: 70%;
            margin-top: auto;
            margin-bottom: auto;
            background: #c9e4f2;
            position: relative;
            display: flex;
            justify-content: center;
            flex-direction: column;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 5px;

        }

        .brand_logo_container {
            position: absolute;
            top: -75px;
            border-radius: 50%;
            background: white;
            padding: 10px;
            text-align: center;
        }

        .brand_logo {
            height: 150px;
            border-radius: 50%;
        }

        .form_container {
            margin-top: 100px;
        }

    </style>
</head>



<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                {{-- <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="{{ asset('resources/images/logo.png') }}" class="brand_logo"
                alt="Logo">
            </div>
        </div> --}}


        <form method="post">
            @csrf

            @if(session('message'))
                <div class="col-sm-12">
                    <div class="alert  alert-danger alert-dismissible fade show text-center" role="alert">
                        <b>{{ session('message') }}</b>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            <div class="form-group">
                <h1 class="text-center">LOGIN</h1>
            </div>
            <div class="form-group d-flex justify-content-center">
                <div class="col-6">
                    <input type="text" class="form-control  text-center" placeholder="USERNAME" name="username">
                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group d-flex justify-content-center">
                <div class="col-6">
                    <input type="password" class="form-control  text-center" placeholder="PASSWORD" name="password">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group d-flex justify-content-center">

                <button type="submit" class="btn btn-success col-4">LOGIN</button>

            </div>
        </form>


    </div>
    </div>
    </div>
</body>

</html>
