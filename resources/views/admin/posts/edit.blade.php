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
    <h1>Sửa bài viết</h1>
    <a href="{{ route('admin.post.') }}" class="btn btn-primay">Danh sách</a>

    <div class="container">
        <form action="{{ route('admin.post.update', $post) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" placeholder="title" name="title"
                    value="{{ $post->title }}" width="" >
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Nhập ảnh</label>
                <input class="form-control" type="file" id="fileImage" name="image">
                <img src="{{ asset('/storage/' . $post->image) }}" alt="" srcset="" width="100">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea class="form-control" rows="3" name="description" value="{{ $post->description }}">{{ $post->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Content</label>
                <textarea class="form-control" rows="6" name="content" value="{{ $post->content }}">{{ $post->content }}</textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">View</label>
                <input type="number" name="view" class="form-control" value="{{ $post->view }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Category</label>
                <select name="cate_id" id="">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}" @if ($cate->id === $post->category_id) selected @endif>
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    <script>
        var file_img = document.querySelector('#fileImage');
        var img = document.querySelect('#img');

        file_img.addEventListener('change', function(evemt) {
            event.preventDefault();
            img.src = URL.createObjectURL(this.files[0]);
        });
    </script>
</body>

</html>
