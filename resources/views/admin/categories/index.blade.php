@extends('admin.layouts.layout')
@section('title', 'Danh sách danh mục')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Thống Kê</a></li>
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
                                <h3 class="card-title">Danh mục </h3>
                            </div>
                            <h1></h1>
                            @if (session('message'))
                                <h2 class="alert alert-success">
                                    {{ session('message') }}
                                </h2>
                            @endif
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">Ảnh</th>
                                            <th scope="col">Slug</th>
                                            <th scope="col">Tên danh mục Cha</th>
                                            <th scope="col">Trạng thái</th>

                                            <th scope="col">
                                                <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                                                    Thêm
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $key => $cate)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $cate->name }}</td>
                                                <td>
                                                    <img src="{{ asset('/storage/') . '/' . $cate->image }}" width="200"
                                                        alt="">
                                                </td>
                                                <td>
                                                    {{ $cate->slug }}
                                                </td>
                                                <td>
                                                    @if ($cate->parent_id == null)
                                                        <span class="badge badge-dark">Danh mục cha</span>
                                                    @else
                                                        <span class="badge badge-warning">{{ $cate->parent->name }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span id="status-{{ $cate->id }}"
                                                        class="badge {{ $cate->is_active ? 'badge-success' : 'badge-danger' }} toggle-status"
                                                        data-id="{{ $cate->id }}">
                                                        {{ $cate->is_active ? 'Kích Hoạt' : 'Không Kích Hoạt' }}
                                                    </span>

                                                </td>
                                                <td class="d-flex">
                                                    <a href="{{ route('admin.category.edit', $cate->id) }}"
                                                        class="btn btn-primary mr-3">Sửa</a>
                                                    <form action="{{ route('admin.category.destroy', $cate->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Bạn có muốn xóa không')"
                                                            type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="">
                                    {{ $categories->links() }}
                                </div>
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

@section('script')
    <script>
        $(document).ready(function() {
            $('.toggle-status').click(function() {
                var cateId = $(this).data('id'); // Lấy ID từ data attribute

                $.ajax({
                    url: '{{ route('admin.category.changeStatus', '') }}' + '/' + cateId,
                    // URL đến route
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}' // CSRF token
                    },
                    success: function(response) {
                        if (response.success) {
                            var statusBadge = $('#status-' + cateId);
                            // Cập nhật giao diện tùy theo trạng thái mới
                            if (response.newStatus) {
                                statusBadge.removeClass('badge-danger').addClass(
                                    'badge-success').text('Kích Hoạt');
                            } else {
                                statusBadge.removeClass('badge-success').addClass(
                                    'badge-danger').text('Không Kích Hoạt');
                            }
                            Swal.fire({
                                title: 'Thông báo!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'Đồng ý'
                            });
                            // Thông báo thành công với PNotify
                            // PNotify.success({
                            //     title: 'Thông báo!',
                            //     text: response.message,
                            //     delay: 3000, // Thời gian hiển thị (3 giây)
                            //     modules: {
                            //         ProgressBar: {
                            //             enabled: true // Bật thanh tiến trình
                            //         }
                            //     }
                            // });
                        }


                    },
                    error: function(xhr, status, error) {
                        console.error('Lỗi từ server:', xhr.responseText); // Xử lý lỗi
                    }
                });
            });
        });
    </script>

@endsection
