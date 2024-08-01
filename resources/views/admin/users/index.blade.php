@extends('admin.layouts.layout')
@section('title', 'User List')
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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                                <h3 class="card-title">User List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>FullName</th>
                                            <th>UserName</th>
                                            <th>Email</th>
                                            <th>Avatar</th>
                                            <th>Role</th>
                                            <th>Active</th>
                                            <th>
                                                <a href="" 
                                                class="btn btn-primary">Thêm
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $stt => $user)
                                            <tr>
                                                <td>{{ $stt + 1 }}</td>
                                                <td>{{ $user->fullname }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <img src="{{ asset('/storage/' ) .'/' . $user->avatar}}" alt="" srcset="" width="100">
                                                </td>
                                                <td>{{ $user->role }}</td>
                                                <td>{{ $user->active == 1 ? 'Hoạt động' : 'Không hoạt động' }}</td>
                                                <td class="d-flex ">
                                                    <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-primary mr-3">Edit</a>
                                                    {{-- <form action="{{ route('admin.users.destroy', $user) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form> --}}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                            {{ $users->links() }}
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
