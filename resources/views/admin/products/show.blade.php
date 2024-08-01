@extends('admin.layouts.layout')
@section('title', 'Product Show')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product Show</h1>
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
                                Product Show
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" name="price" class="form-control"  value="{{ $product->price }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input class="form-control" type="file" id="formFile" name="image">
                                    <img src="{{ asset('/storage/') .'/'.$product->image}}" alt="" width="100px">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $cate)
                                            <option value="{{ $cate->id }}" @selected($product->category_id == $cate->id)>
                                                {{ $cate->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>      
                                <div class="mb-3">
                                    <label class="form-label">Quantity</label>
                                    <input class="form-control" type="number" name="quantity" value="0" value="{{ $product->quantity }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea id="summernote" rows="6" name="description" >
                                        {{ $product->description }}
                                    </textarea>
                                </div>
                                <div class="mb-3">
                                  <a href="{{ route('admin.product.') }}" class="btn btn-dark">List</a>
                                </div>
                            </form>

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