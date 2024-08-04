@extends('layouts.layout')
@section('title')
    Sản phẩm
@endsection
@section('libs-css')
    <link rel="stylesheet" href="{{ asset('clients/asset') }}/css/productDetail.css">
@endsection
@section('content')
    <!-- Product Details -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="product-image">
                    <img src="{{ $productDetail->image }}" alt="Product Image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-details">
                    <h2 class="product-title">{{ $productDetail->name }}</h2>
                    <p class="product-price">{{ $productDetail->price }}$</p>
                    <div class="product-description">
                        <p>{{ $productDetail->description }}.</p>
                    </div>
                    <div class="product-options">
                        <div class="form-group">
                            <label for="size">Kích cỡ:</label>
                            <select class="form-control" id="size">
                                <option>Size M</option>
                                <option>Size L</option>
                                <option>Size XL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="color">Màu sắc:</label>
                            <select class="form-control" id="color">
                                <option>Màu Đỏ</option>
                                <option>Màu Xanh</option>
                                <option>Màu Đen</option>
                            </select>
                        </div>
                    </div>
                    <div class="product-quantity">
                        <label for="quantity">Số lượng:</label>
                        <input type="number" id="quantity" name="quantity" value="{{ $productDetail->quantity }}"
                            min="1">
                    </div>
                    <button class="btn btn-warning">Thêm vào giỏ hàng</button>
                    <p class="shipping-info">Giao hàng miễn phí trong khu vực nội thành.</p>
                </div>
            </div>
            <div class="related-products">
                <h3>Sản phẩm liên quan</h3>
                <!-- Danh sách sản phẩm liên quan -->
                @foreach ($relatedProducts as $relate)
                    <a href="{{ route('productDetail', $relate->id) }}">
                        <div class="related-product">
                            <img src="{{ $relate->image }}" alt="Related Product">
                            <p>{{ $relate->name }}</p>
                            <p>{{ $relate->price }}$</p>
                        </div>
                    </a>
                @endforeach

            </div>

            <!-- Comments Section -->
            <div class="comments-section">
                <h3>Bình luận</h3>
                @foreach ($comments as $comment)
                <div class="comment d-flex ">
                    <p><strong>{{ $comment->user->fullname }}:</strong> {{ $comment->content }}</p>
            
                    <!-- Form xóa bình luận -->
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="post" style="display:inline; margin-left:90% " class="float-end">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này?');" class="btn btn-danger">Xóa</button>
                    </form>
                </div>
            @endforeach
                <!-- Comment Form -->
                @auth
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="comment">Thêm bình luận:</label>
                            <textarea id="comment" name="comment" class="form-control" rows="4" required></textarea>
                        </div>
                        <input type="hidden" name="product_id" value="{{ $productDetail->id }}">
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                @else
                    <p>Vui lòng <a href="{{ route('account') }}">đăng nhập</a> để thêm bình luận.</p>
                @endauth
            </div>
        </div>
    </div>
    </div>
@endsection
