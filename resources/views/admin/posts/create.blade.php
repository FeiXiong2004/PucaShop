<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Thêm mới bài viết</h1>
    <a href="{{ route('admin.post.') }}" class="btn btn-primay">Danh sách</a>

    <div class="container">
        <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" placeholder="title" name="title">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Nhập ảnh</label>
                <input class="form-control" type="file" id="formFile" name="image">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea class="form-control" rows="3" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Content</label>
                <textarea class="form-control" rows="6" name="content"></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">View</label>
                <input type="number" name="view" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Category</label>
                <select name="cate_id" id="">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}">
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </div>
        </form>
    </div>
</body>

</html>