<div class="header__top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-7">
                <div class="header__top__left">
                    <p>
                        Chào quý khánh đến vói PucaShop
                    </p>
                </div>
            </div>
                  
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">
                  @if (Auth::check())   
                            @if (Auth::user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}">Chuyển sang Admin</a>
                            @endif

                            <a href="{{ route('showAccount', Auth::user()->id) }}">My Account</a>
                            <a href="{{ route('logout') }}" class="logout">Logout</a>
                        @else
                            <a style="color: #FFF" href="{{ route('account') }}">Sign in</a>
                      
            @endif
        </div>
        {{-- <div class="header__top__hover">
                        <span>Usd <i class="arrow_carrot-down"></i></span>
                        <ul>
                            <li>USD</li>
                            <li>EUR</li>
                            <li>USD</li>
                        </ul>
                    </div> --}}
    </div>
</div>
</div>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <div class="header__logo">
                <a href="./index.html"><img src="client_public/img/logo.png" alt=""></a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <nav class="header__menu mobile-menu">
                <ul>
                    <li class="active"><a href="./index.html">Home</a></li>
                    <li><a href="./shop.html">Shop</a></li>
                    <li><a href="#">Pages</a>
                        <ul class="dropdown">
                            <li><a href="./about.html">About Us</a></li>
                            <li><a href="./shop-details.html">Shop Details</a></li>
                            <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                            <li><a href="./checkout.html">Check Out</a></li>
                            <li><a href="./blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li><a href="./blog.html">Blog</a></li>
                    <li><a href="./contact.html">Contacts</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="header__nav__option">
                <a href="#" class="search-switch"><img src="client_public/img/icon/search.png" alt=""></a>
                <a href="#"><img src="client_public/img/icon/heart.png" alt=""></a>
                <a href="#"><img src="client_public/img/icon/cart.png" alt=""> <span>0</span></a>
                <div class="price">$0.00</div>
            </div>
        </div>
    </div>
    <div class="canvas__open"><i class="fa fa-bars"></i></div>
</div>
