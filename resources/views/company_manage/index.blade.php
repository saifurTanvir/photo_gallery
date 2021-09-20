<!DOCTYPE html>
<html lang="en">

<head>
    <title>Company Manage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
        <a class="navbar-brand mx-5" href="#">{{ $company->company_name }}</a>

        <ul class="navbar-nav">


            <li class="nav-item dropdown mx-5">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Shop
                </a>
                <div class="dropdown-menu">
                    @foreach($company->shop AS $shop)
                        <a class="dropdown-item"
                            href="{{ route('product_list_by_shop_name', [$company->company_id, $shop->shop_id]) }}">{{ $shop->shop_name }}</a>
                    @endforeach
                </div>
            </li>

            <li class="nav-item dropdown mx-5">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Category
                </a>
                <div class="dropdown-menu">
                    @foreach($company->category AS $category)
                        <a class="dropdown-item"
                            href="{{ route('product_list_by_category', [$company->company_id, $category->category_id]) }}">{{ $category->category_name }}</a>
                    @endforeach
                </div>
            </li>
            <li class="nav-item mx-5">
                <a class="nav-link"
                    href="{{ route('product_list_by_company', $company->company_id) }}">Product</a>
            </li>
        </ul>
    </nav>
    <br>

    <div class="container">
        <h3>{{ $company->company_name }}</h3>

        <div class="card-deck my-3">
            <a href="{{ route('shop.index', $company->company_id) }}" class="card bg-primary">
                <div class="card-body text-center">
                    <h4 class="card-text text-bold">Total Number of Shop</h4>
                    <h2 class="card-text">{{ count($company->shop) }}</h2>
                </div>
            </a>
            <a href="{{ route('category.index', $company->company_id) }}"
                class="card bg-warning">
                <div class="card-body text-center">
                    <h4 class="card-text">Total Number of Category</h4>
                    <h2 class="card-text">{{ count($company->category) }}</h2>
                </div>
            </a>
            <div class="card bg-info">
                <div class="card-body text-center">
                    <h4 class="card-text">Total Number of Product</h4>
                    <h2 class="card-text">{{ count($company->product) }}</h2>
                </div>
            </div>
        </div>

    </div>

</body>

</html>
