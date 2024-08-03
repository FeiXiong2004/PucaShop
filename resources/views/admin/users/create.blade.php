@extends('admin.layouts.layout')
@section('title', 'User Update')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Update</h1>
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
                                User Update
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form action="{{ route('admin.user.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                            
                                <div class="mb-3">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" name="fullname" class="form-control" required
                                      >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">User Name</label>
                                    <input type="text" name="username" class="form-control" required
                                        >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Hình</label>
                                    <input class="form-control" type="file" id="formFile" name="avatar">
                                   
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Role</label>
                                    <select class="form-selected"  name="role" required>
                                        <option  value="admin">Admin</option>
                                        <option value="user   ">User</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Active</label>
                                    <select class="form-selected"  name="active" required>
                                        <option  value="1">Hoạt Động </option>
                                        <option  value="0">Không Hoạt Động</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Create </button>
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
