@extends('admin.layouts.layout')
@section('title', 'Thêm thương hiệu')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm thương hiệu</h1>
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
                               Thêm thương hiệu
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="container">

                                <form action="{{ route('admin.brand.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tên </label>
                                        <input type="text" class="form-control " placeholder="Name" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Description</label>
                                        <input type="text" class="form-control"  placeholder="Mô tả ngắn" name="description" value="{{ old('description') }}" >
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label  class="form-label mr-5">Trạng thái</label>
                                        
                                        <input   type="radio" name="status" id="" value="1" > Hoạt Động 
                                        <input  type="radio" name="status" id="" value="0" > Không Hoạt Động
                                            @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                  

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                        <a  href="{{ route('admin.brand.') }}" class="btn btn-dark" >Trở lại danh sách</a>
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


@endsection
