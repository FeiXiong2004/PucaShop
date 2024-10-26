@extends('admin.layouts.layout')
@section('title', 'Thêm danh mục')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm danh mục</h1>
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
                                Category Create
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="container">

                                <form action="{{ route('admin.category.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Danh mục cha </label>
                                        <select class="form-select" type="text"  name="parent_id">
                                            <option value="">Chọn danh mục cha</option>
                                            {!! $getCategories !!}
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Tên </label>
                                        <input type="text" class="form-control "   id="name" placeholder="Tên danh mục" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Slug</label>
                                        <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug" value="{{ old('slug') }}" >
                                        @error('slug')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Ảnh</label>
                                        <input class="form-control" type="file" id="formFile" name="image"  value="{{ old('image') }}">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label  class="form-label mr-5">Trạng thái</label>
                                        <input   type="radio" name="is_active" id="" value="1" > Hoạt Động 
                                        <input  type="radio" name="is_active" id="" value="0" > Không Hoạt Động
                                         @error('is_active')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                  

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                        <a  href="{{ route('admin.category.') }}" class="btn btn-dark" >Trở lại danh sách</a>
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
<script>
 document.getElementById("name").addEventListener("input", function (){
     var name = document.getElementById("name").value;
     document.getElementById("slug").value  = name.toLowerCase()
         .normalize('NFD') // Chuẩn hóa ký tự unicode
         .replace(/[\u0300-\u036f]/g, '') // Xóa dấu
         .replace(/[^a-z0-9 ]/g, '') // Xóa ký tự đặc biệt
         .replace(/\s+/g, '-') // Thay khoảng trắng bằng dấu gạch ngang
         .replace(/-+/g, '-') // Xóa gạch ngang thừa
         .replace(/^-|-$/g, ''); // Xóa gạch ngang ở đầu và cuối
     ;
    })
</script>

@endsection
