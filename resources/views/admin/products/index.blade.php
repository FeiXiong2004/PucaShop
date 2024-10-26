@extends('admin.layouts.layout')
@section('title', 'Danh sách sản phẩm')
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
                                <h3 class="card-title">Danh sách sản phẩm</h3>
                            </div>
                            <div class="card-body">
                                @if (session('message'))
                                    <h2 class="alert alert-success">
                                        {{ session('message') }}
                                    </h2>
                                @endif
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Tên Sản Phẩm</th>
                                            <th scope="col">Mã Sản Phẩm</th>
                                            <th scope="col">Slug</th>
                                            <th scope="col">Thương Hiệu</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Trạng Thái</th>
                                            <th scope="col">
                                                <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                                                    Thêm mới
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $key=> $product)
                                            <tr>
                                                <th scope="row">{{ $product->id }}</th>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->sku }}</td>
                                                <td>{{ $product->slug }}</td>
                                                <td>{{ $product->brand->name }}</td>
                                                <td>{{ $product->category->name }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('admin.product.edit', $product->id) }}"
                                                        class="btn btn-primary mr-3">Edit</a>
                                                    <a href="{{ route('admin.product.show', $product->id) }}"
                                                        class="btn btn-warning mr-3">Show</a>
                                                    <form action="{{ route('admin.product.destroy', $product->id) }}"
                                                        method="post">
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
                                {{ $products->links() }}
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
