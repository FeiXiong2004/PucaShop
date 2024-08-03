@extends('admin.layouts.layout')
@section('title', 'Product List')
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
                                <h3 class="card-title">Product List</h3>
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
                                            <th scope="col">#ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">
                                                <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                                                    Thêm mới
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productsAdmin as $pro)
                                            <tr>
                                                <th scope="row">{{ $pro->id }}</th>
                                                <td>{{ $pro->name }}</td>
                                                <td>{{ $pro->price }}</td>
                                                <td>
                                                    <img src="{{ asset('/storage/') . '/' . $pro->image }}" width="200"
                                                        alt="">
                                                </td>
                                                <td>{{ $pro->quantity }}</td>
                                                <td>{!! $pro->description !!}</td>
                                                <td>{{ $pro->category->name }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('admin.product.edit', $pro->id) }}"
                                                        class="btn btn-primary mr-3">Edit</a>
                                                    <a href="{{ route('admin.product.show', $pro->id) }}"
                                                        class="btn btn-warning mr-3">Show</a>
                                                    <form action="{{ route('admin.product.destroy', $pro->id) }}"
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
                                {{ $productsAdmin->links() }}
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
