<!-- resources/views/products/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <title>Chi Tiết Sản Phẩm</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-hexashop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
    <style>
        .product-detail {
            padding: 60px 0;
        }
        .product-image img {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .product-details {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .product-details h2 {
            font-size: 2em;
            color: #333;
            margin-bottom: 15px;
        }
        .product-details .price {
            font-size: 1.8em;
            color: #ff6f61;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .product-details .description {
            margin-bottom: 20px;
            color: #666;
        }
        .main-border-button a {
            display: inline-block;
            padding: 12px 25px;
            background-color: #ff6f61;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .main-border-button a:hover {
            background-color: #e94e77;
        }
        .related-products {
            margin-top: 60px;
        }
        .related-products h3 {
            margin-bottom: 20px;
            font-size: 1.5em;
            color: #333;
        }
        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .product-item {
            flex: 1 1 calc(33.333% - 20px);
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            text-align: center;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .product-item:hover {
            transform: scale(1.03);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
        }
        .product-item img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
        }
        .product-item h4 {
            font-size: 1.2em;
            margin: 10px 0;
            color: #333;
        }
        .product-item .price {
            font-size: 1em;
            color: #ff6f61;
            margin-bottom: 10px;
        }
        @media (max-width: 768px) {
            .product-item {
                flex: 1 1 calc(50% - 20px);
            }
        }
        @media (max-width: 576px) {
            .product-item {
                flex: 1 1 100%;
            }
        }
    </style>
</head>
<body>
    <!-- ***** Header Area Start ***** -->
    @include('users.layouts.header')
    <!-- ***** Header Area End ***** -->

    <!-- ***** Product Detail Area Start ***** -->
    <div class="product-detail">
        <div class="container">
            <div class="row">
                <!-- Product Image -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="product-image">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                    </div>
                </div>
                <!-- Product Details -->
                <div class="col-lg-6">
                    <div class="product-details">
                        <h2>{{ $product->name }}</h2>
                        <p class="price">{{ number_format($product->price, 0, ',', '.') }} VND</p>
                        <p class="description">{{ $product->description }}</p>
                        <div class="main-border-button">
                            <a href="#">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Product Detail Area End ***** -->

    <!-- ***** Related Products Start ***** -->
    <!-- ***** Related Products End ***** -->

    <!-- ***** Footer Start ***** -->
    @include('users.layouts.footer')
    <!-- ***** Footer End ***** -->

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-2.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/imgfix.min.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>