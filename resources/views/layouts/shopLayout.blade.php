<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shop Manage</title>
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
        a,
        span.link {
            color: #000000;
            text-decoration: none !important;
        }

        a:visited,
        span.visited {
            color: #000000;
            text-decoration: none !important;
        }

        a:active,
        span.active {
            color: #000000;
            text-decoration: none !important;
        }

    </style>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand mx-5" href="#">{{ $shop->shop_name }}</a>

        <ul class="navbar-nav">


            <li class="nav-item dropdown mx-5">
                <a class="nav-link dropdown-toggle" href="#" id="" data-toggle="dropdown">
                    Category
                </a>
                <div class="dropdown-menu">
                    @if($shop->company->category)
                        @foreach($shop->company->category AS $category)
                            <a class="dropdown-item"
                                href="{{ route('shop.manage.product_list_by_category', [$shop->shop_id, $category->category_id]) }}">{{ $category->category_name }}</a>
                        @endforeach
                    @endif
                </div>
            </li>
            <li class="nav-item mx-5">
                <a class="nav-link"
                    href="{{ route('shop.manage.product', $shop->shop_id) }}">Product</a>
            </li>
        </ul>
    </nav>
    <br>

    @yield('content')

</body>

</html>
