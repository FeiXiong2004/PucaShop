@extends('admin.layouts.layout')
@section('title', 'Cập nhật danh mục')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Cập nhật danh mục</h1>
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
                                Cập nhật danh mục
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="container">
                                <form action="{{ route('admin.category.update', ['id'=>$category->id]) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Danh mục cha</label>
                                        <select class="form-select" type="text"  name="parent_id">
                                            <option value="">Chọn danh mục cha</option>
                                           {!! $getCategories !!}
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                                            value="{{ $category->name }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Slug</label>
                                        <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug" value="{{ $category->slug }}" >
                                        @error('slug')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Image</label>
                                        <input class="form-control" type="file" id="formFile" name="image">
                                        <img src="{{ asset('/storage/' . $category->image) }}" alt="" srcset=""
                                            width="100">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label  class="form-label mr-5">Is_Active</label>
                                        <input   type="radio" name="is_active" id="" value="1" {{ $brand->is_active == 1 ? 'checked' : "" }}> Active
                                        <input  type="radio" name="is_active" id="" value="0" {{ $brand->is_active == 0 ? 'checked' : "" }}> Inactive
                                            @error('is_active')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a  href="{{ route('admin.category.') }}" class="btn btn-dark" >Back List</a>
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
