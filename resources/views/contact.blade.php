@extends('layouts.layout')

@section('title')
    Liên Hệ
@endsection

@section('libs-css')
    <link rel="stylesheet" href="{{ asset('clients/asset') }}/css/contact.css">
@endsection

@section('content')
    <div class="container mb-5">
        <h1 class="text-center">Liên Hệ</h1>

        <!-- Contact Form -->
        <div class="row">
            <div class="contact-form col-6 ">
                <h2>Thông Tin Khách Hàng </h2>
                @if (session('message'))
                    <h2 class="alert alert-success">
                        {{ session('message') }}
                    </h2>
                @endif
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3 border-1">
                        <label for="" class="form-label">Tiêu Đề
                            <span style="color: red">*</span>
                        </label>
                        <input type="text" class="form-control" name="title" placeholder="Title" required>

                    </div>
                    <div class="form-group mb-3 border-1">
                        <label for="" class="form-label">Họ và tên
                            <span style="color: red">*</span>
                        </label>
                        <input type="text" class="form-control" name="fullname" placeholder="FullName" required>

                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Email
                            <span style="color: red">*</span>
                        </label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Điện thoại
                            <span style="color: red">*</span>
                        </label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Tin nhắn
                            <span style="color: red">*</span>
                        </label>
                        <textarea class="form-control" name="messageContent" placeholder="Tin nhắn viết tại đây" rows="5" required></textarea>
                    </div>
                    <div class=" mb-3">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </form>

            </div>
            <div class="col-4">
                <h3>Địa chỉ Puca Shop</h3>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.07735018997!2d105.81288291118264!3d20.989536289043212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac92ec270dfb%3A0xf57847c687880f95!2zNjIgTmcuIDI5IFAuIEtoxrDGoW5nIEjhuqEsIEtoxrDGoW5nIMSQw6xuaCwgVGhhbmggWHXDom4sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1722840389371!5m2!1svi!2s"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="inforContact row text-center mb-2 ">
            <div class="col-12">
                <h3>Thông tin liên hệ</h3>
                <p>Email: <a class="text-lowercase" href="hunghn2004@gmail.com">hunghn2004@gmail.com</a></p>
                <p>Điện thoại: 0366 420 732</p>
                <p>Địa chỉ: 62 Ngõ 29 Khương Hạ Khương Đình Thanh Xuân Hà Nội</p>
                <b>Thời gian hoạt động: 9h - 17h (Từ thứ 2 đến thứ 6)</b>
            </div>
        </div>
    </div>
@endsection
