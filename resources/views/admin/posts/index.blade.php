
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1>Danh sách bài viết</h1>
    @if (session('message'))
    <h2 class="alert alert-light">
        {{ session('message') }}
    </h2>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">description</th>
                <th scope="col">View</th>
                <th scope="col">Cate</th>
                <th scope="col">
                    <a href="{{ route('admin.post.create') }}" class="btn btn-primary">
                        Thêm mới
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>
                        <img src="{{ asset('/storage/'). '/' . $post->image }}" width="60" alt="">
                    </td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->view }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td class="d-flex">
                        <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-primary me-1">Edit</a>
                        <form action="{{ route('admin.post.destroy', $post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn có muốn xóa không')" type="submit"
                                class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $posts->links() }}
</body>

</html>
