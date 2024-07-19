@extends('layouts.layout')

@section('title')
    Trang chủ
@endsection

@section('libs-css')
    <link rel="stylesheet" href="{{ asset('clients/asset') }}/css/home.css">
@endsection
@section('content')
    <!-- Slide -->
    <div class="container-fuild">
        <div class="slide">
         
                <button class="slide_action_pre">< </button>
                    <div class="slide_content">
                        @foreach ($categories as $cate)
                            <img src="{{ $cate->image }}" alt="{{ $cate->name }}">
                        @endforeach
                    </div>
                <button class="slide_action_next">></button>
           
        </div>
    </div>
    <main>
        <!-- Category -->
        <section id="category_home">
            <div class="container pt-5 pb-5">
                <h1 class="text-center text_category" style="font-size: 3rem;">Danh mục sản phẩm</h1>
                <div class="list_item_category">
                    @foreach ($categories as $cate)
                    <a href="{{ route('shop',$cate->id) }}">
                        <div class="item_category ">
                            {{-- <img src="{{ asset('clients/asset') }}/image/Puca home.png" alt=""> --}}
                            <img src="{{ $cate->image }}" alt="">
                            <h2>{{ $cate->name}}</h2>       
                        </div>            
                    </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="products_home">
            <div class="container pt-5 pb-5">
                <h1 class="text-center text_products" style="font-size: 3rem;">Sản phẩm bán chạy</h1>
                <div class="list_item_products">
                        @foreach ($highestPriceProducts as $product)
                        <a href="{{ route('productDetail', $product->id )}}">
                            <div class="item_products">
                                <div class="item_products_img">
                                    <i class="fa fa-heart" style="font-size:48px"></i>
                                    <img src="{{ $product->image }}" alt="">
                                </div>
                                <p class="mt-3">{{ $product->name}}</p>
                                <h2> {{ $product->price }}$</h2>
                                <div class="item_products_btn">
                                    <button class="btn btn-warning">Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                        </a>
                        @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection

@section('libs-script')
    <script src="{{ asset('clients/asset') }}/js/home.js"></script>
@endsection
