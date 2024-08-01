@extends('admin.layouts.layout')
@section('title', 'Danh sách bài viết')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách bài viết</h3>
                            </div>
                            <h1></h1>
                            @if (session('message'))
                                <h2 class="alert alert-light">
                                    {{ session('message') }}
                                </h2>
                            @endif
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">description</th>
                                            <th scope="col">View</th>
                                            <th scope="col">Cate</th>
                                            <th scope="col">
                                                <a href="{{ route('admin.post.create') }}" class="btn btn-primary">
                                                    Thêm mới
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <th scope="row">{{ $post->id }}</th>
                                                <td>{{ $post->title }}</td>
                                                <td>
                                                    <img src="{{ asset('/storage/') . '/' . $post->image }}" width="60"
                                                        alt="">
                                                </td>
                                                <td>{{ $post->description }}</td>
                                                <td>{{ $post->view }}</td>
                                                <td>{{ $post->category->name }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('admin.post.edit', $post->id) }}"
                                                        class="btn btn-primary me-1">Edit</a>
                                                    <form action="{{ route('admin.post.destroy', $post) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Bạn có muốn xóa không')"
                                                            type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{ $posts->links() }}
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
