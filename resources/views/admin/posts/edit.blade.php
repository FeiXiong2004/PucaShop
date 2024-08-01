@extends('admin.layouts.layout')
@section('title', 'Cập nhật bài viết')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Cập nhật bài viết </h1>
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
                                Cập nhật bài viết
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="container">
                                <form action="{{ route('admin.post.update', $post) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="" class="form-label">Title</label>
                                        <input type="text" class="form-control" placeholder="title" name="title"
                                            value="{{ $post->title }}" width="" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Nhập ảnh</label>
                                        <input class="form-control" type="file" id="fileImage" name="image">
                                        <img src="{{ asset('/storage/' . $post->image) }}" alt="" srcset="" width="100">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Description</label>
                                        <textarea class="form-control" rows="3" name="description" value="{{ $post->description }}">{{ $post->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Content</label>
                                        <textarea class="form-control" rows="6" name="content" value="{{ $post->content }}">{{ $post->content }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">View</label>
                                        <input type="number" name="view" class="form-control" value="{{ $post->view }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Category</label>
                                        <select name="cate_id" id="">
                                            @foreach ($categories as $cate)
                                                <option value="{{ $cate->id }}" @if ($cate->id === $post->category_id) selected @endif>
                                                    {{ $cate->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
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