@extends('admin.layout')
@section('title', 'Thêm sản phẩm')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm sản phẩm</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Text Editors</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                Thêm sản phẩm
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Code</label>
                                    <input type="text" name="code" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tên sản phẩm</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Danh mục</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $cate)
                                            <option value="{{ $cate->id }}">
                                                {{ $cate->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Thương hiệu</label>
                                    <select name="brand_id" class="form-control">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Hình</label>
                                    <input class="form-control" type="file" id="formFile" name="image">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Giá</label>
                                    <input class="form-control" type="number" name="price">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Giá giảm</label>
                                    <input class="form-control" type="number" name="sale_price">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Mô tả</label>
                                    <textarea id="summernote" rows="6" name="description"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Chất liệu</label>
                                    <textarea id="material" name="material"></textarea>
                                </div>

                                <div class="mb-3">
                                    <button class="btn btn-primary" id="add_variant">Thêm biến thể</button>
                                </div>

                                <div id="variant">

                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
                <!-- /.col-->
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <!-- Summernote -->
    <script src="{{ asset('/asset/admin/') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()
            $('#material').summernote()
            // CodeMirror
            // CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            //     mode: "htmlmixed",
            //     theme: "monokai"
            // });
        });
    </script>

    <script>
        var add_variant = document.querySelector('#add_variant');

        var variant = document.querySelector('#variant');
        var html = ``;
        add_variant.addEventListener('click', function(e) {
            e.preventDefault();
            html += `
            <div class="d-flex">
                <div class="mb-3 mr-3">
                    <label class="form-label">Chọn màu</label>
                    <select name='color_id[]'>
                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}">
                                {{ $color->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 mr-4 ">
                    <label class="form-label">Chọn size</label>
                    <select name='size_id[]'>
                        @foreach ($sizes as $size)
                            <option value="{{ $size->id }}">
                                {{ $size->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 mr-4 d-flex">
                    <label class="form-label">Số lượng</label>
                    <input type="number" value="0" name="quantity[]" class="form-control">
                </div>
                <div class="mb-3 mr-4 d-flex">
                    <label class="form-label">Hình ảnh</label>
                    <input type="file" name="hinh[]" class="form-control">
                </div>
               
            </div>`;

            variant.innerHTML += html;
       
        });
    </script>
@endsection