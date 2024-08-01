@extends('admin.layouts.layout')
@section('title', 'Thêm bài viết')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm bài viết</h1>
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
                                Thêm bài viết
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="container">
                                <form action="{{ route('admin.post.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Title</label>
                                        <input type="text" class="form-control" placeholder="title" name="title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Nhập ảnh</label>
                                        <input class="form-control" type="file" id="formFile" name="image">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Description</label>
                                        <textarea class="form-control" rows="3" name="description"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Content</label>
                                        <textarea class="form-control" rows="6" name="content"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">View</label>
                                        <input type="number" name="view" class="form-control" id="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Category</label>
                                        <select name="cate_id" id="">
                                            @foreach ($categories as $cate)
                                                <option value="{{ $cate->id }}">
                                                    {{ $cate->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Thêm mới</button>
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

    <script>
        var add_variant = document.querySelector('#add_variant');

        var variant = document.querySelector('#variant');
        var html = ``;
    </script>
@endsection
