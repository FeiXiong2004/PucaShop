<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('clients/asset') }}/css/header.css">
    <link rel="stylesheet" href="{{ asset('clients/asset') }}/css/footer.css">
    @yield('libs-css')
</head>
<body>
    <div class="wrapper">
        <!-- Header -->
        <header class="header_page">
            <div class="header_page_logo">
                <img src="{{ asset('clients/asset') }}/image/Puca home.png" alt="Logo">
            </div>
            <div class="header_page_menu">
                <ul class="list_header_menu ">
                    <li class="list_menu_item"><a href="{{ route('home') }}">Trang Chủ</a></li>
                    <li class="list_menu_item">
                        <a href="{{ route('shop') }}">Cửa hàng</a>
                    </li>
                    <li class="list_menu_item"><a href="">Blog</a></li>
                    <li class="list_menu_item"><a href="">Liên hệ</a></li>
                </ul>
                <div class="list_header_icon">
                    <a href="login.html">
                        <i class="fa fa-user"></i>
                        <div class="dropdown-menu">
                            <a href="login.html">Đăng nhập</a>
                            <a href="register.html">Đăng ký</a>
                         </div>
                    </a>
                    <a href="">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </div>
            </div>
        </header>
       
        @yield('content')
        <!-- Footer -->
        <footer class="footer_page bg-dark text-white pt-5 pb-4">
            <div class="container text-center text-md-left">
                <div class="row text-center text-md-left">
                    <!-- About -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">PucaShop</h5>
                        <p>Welcome to PucaShop, your number one source for all things [product, ie: furniture,
                            electronics]. We're dedicated to providing you the very best of [product], with an emphasis
                            on [three characteristics, ie: dependability, customer service, and uniqueness.]</p>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact</h5>
                        <p><i class="fa fa-home mr-3"></i> 123 Main St, Anytown, USA</p>
                        <p><i class="fa fa-envelope mr-3"></i> info@pucashop.com</p>
                        <p><i class="fa fa-phone mr-3"></i> +1 234 567 890</p>
                        <p><i class="fa fa-print mr-3"></i> +1 234 567 891</p>
                    </div>

                    <!-- Social Media -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Follow Us</h5>
                        <a href="#" class="text-white"><i class="fa fa-facebook mr-3"></i></a>
                        <a href="#" class="text-white"><i class="fa fa-twitter mr-3"></i></a>
                        <a href="#" class="text-white"><i class="fa fa-instagram mr-3"></i></a>
                        <a href="#" class="text-white"><i class="fa fa-linkedin mr-3"></i></a>
                    </div>

                    <!-- Useful Links -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Useful Links</h5>
                        <p><a href="#" class="text-white">Your Account</a></p>
                        <p><a href="#" class="text-white">Become an Affiliate</a></p>
                        <p><a href="#" class="text-white">Shipping Rates</a></p>
                        <p><a href="#" class="text-white">Help</a></p>
                    </div>
                </div>

                <hr class="mb-4">

                <div class="row align-items-center">
                    <!-- Copyright -->
                    <div class="col-md-7 col-lg-8">
                        <p class="text-center text-md-left">© 2024 All Rights Reserved by:
                            <a href="#" class="text-warning"><strong>PucaShop</strong></a>
                        </p>
                    </div>

                    <!-- Social Media Links -->
                    <div class="col-md-5 col-lg-4">
                        <div class="text-center text-md-right">
                            <a href="#" class="text-white"><i class="fa fa-facebook mr-4"></i></a>
                            <a href="#" class="text-white"><i class="fa fa-twitter mr-4"></i></a>
                            <a href="#" class="text-white"><i class="fa fa-instagram mr-4"></i></a>
                            <a href="#" class="text-white"><i class="fa fa-linkedin mr-4"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
@yield('libs-script')
</html>