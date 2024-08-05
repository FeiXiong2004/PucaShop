@extends('admin.layouts.layout')
@section('title', 'Dashboard');
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard <b>PucaShop</b></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
               

                <div class="row">
                    <!-- Tổng số sản phẩm -->
                    <div class="col-md-4 mb-4">
                        <div class="card bg-primary text-white" style="  background: -webkit-linear-gradient(left, #FF9966, #fa4299);"> 
                            <div class="card-header">
                                Tổng số sản phẩm
                            </div>
                            <div class="card-body">
                                <h2>{{ $totalProducts }}</h2>
                                <p class="text">Sản phẩm hiện có trong hệ thống</p>
                            </div>
                        </div>
                    </div>
            
                    <!-- Tổng số sản phẩm của mỗi danh mục -->
                    <div class="col-md-4 mb-4">
                        <div class="card bg-success text-white" style="  background: -webkit-linear-gradient(left, #FF9966, #fa4299);">
                            <div class="card-header">
                                Tổng số sản phẩm theo danh mục
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach($productsByCategory as $category)
                                        <li class="list-group-item">
                                            {{ $category->name }}: <span class="badge bg-light text-dark"
                                            style="  background: -webkit-linear-gradient(left, #FF9966, #fa4299);">{{ $category->products_count }} sản phẩm</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
            
                    <!-- Tổng lượt xem -->
                    <div class="col-md-4 mb-4">
                        <div class="card bg-info text-white" style="  background: -webkit-linear-gradient(left, #FF9966, #fa4299);">
                            <div class="card-header">
                                Tổng số bài viết hiện nay
                            </div>
                            <div class="card-body">
                                <h2>{{ $totalPosts }}</h2>
                                <p class="text">   Tổng số bài viết có trong hệ thống</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
