@extends('admin.layouts.layout')
@section('title', 'Danh sách thương hiệu')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Chuyển sang trang Thống Kê</a></li>
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
                                <h3 class="card-title">Thương hiệu</h3>
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
                                            <th scope="col">Mô tả</th>
                                            <th scope="col">Trạng thái</th>
                                            
                                            <th scope="col">
                                                <a href="{{ route('admin.brand.create') }}" class="btn btn-primary">
                                                   Thêm 
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $key=> $brand)
                                            <tr>
                                                <th scope="row">{{ $key+1}}</th>
                                                <td>{{ $brand->name }}</td>
                                                <td>
                                                    {{  $brand->description }}
                                                </td>
                                                <td>
                                                    <span id="status-{{ $brand->id }}"
                                                        class="badge {{ $brand->status ? 'badge-success' : 'badge-danger' }} toggle-status"
                                                        data-id="{{ $brand->id }}">
                                                        {{ $brand->status ? 'Kích Hoạt' : 'Không Kích Hoạt' }}
                                                    </span>

                                                </td>
                                                <td class="d-flex">
                                                    <a href="{{ route('admin.brand.edit',['id' => $brand->id,'slug'=>$brand->slug] ) }}"
                                                        class="btn btn-primary mr-3">Sửa</a>
                                                    <form action="{{ route('admin.brand.destroy', $brand) }}" method="post">
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
                                {{ $brands->links() }}
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
                var brandId = $(this).data('id'); // Lấy ID từ data attribute

                $.ajax({
                    url: '{{ route('admin.brand.changeStatus', '') }}' + '/' + brandId,
                    // URL đến route
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}' // CSRF token
                    },
                    success: function(response) {
                        if (response.success) {
                            var statusBadge = $('#status-' + brandId);
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