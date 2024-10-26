@extends('admin.layouts.layout')
@section('title', 'Product Update')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product Update</h1>
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
                                Product Update
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="container">
                                <form action="{{ route('admin.product.update',$product->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="form-label">Chọn danh mục </label>
                                        <select name="category_id" class="form-control">
                                            @foreach ($categories as $cate)
                                                <option value="{{ $cate->id }}">
                                                    {{ $cate->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Chọn thương hiệu </label>
                                        <select name="brand_id" class="form-control">
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tên Sản Phẩm</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Mã Sản Phẩm</label>
                                        <input type="text" name="sku" class="form-control"
                                            value="{{ old('sku') }}">
                                        @error('sku')
                                            {{ $message }}
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control"
                                            value="{{ old('slug') }}">
                                        @error('slug')
                                            {{ $message }}
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Giá</label>
                                        <input type="text" name="price" class="form-control">
                                        @error('price')
                                            {{ $message }}
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Mô tả</label>
                                        <textarea class="form-control" id="summernote" rows="6" name="description">{{ old('description') }}</textarea>
                                        @error('description')
                                            {{ $message }}
                                        @enderror
                                    </div>

                                    <div class="mb-3">Ảnh </label>
                                        <input class="form-control" type="file" name="product_images[]" multiple>
                                        @error('product_images')
                                            {{ $message }}
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label mr-5">Trạng thái</label>
                                        <input type="radio" name="is_active" id="" value="1"> Hoạt Động
                                        <input type="radio" name="is_active" id="" value="0"> Không Hoạt
                                        Động
                                        @error('is_active')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-dark">Thêm</button>
                                    </div>

                                </form>
                            </div>

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

   
@endsection