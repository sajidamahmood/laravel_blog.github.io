<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Create Post</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href={{ route('posts.index') }}>CRUDPosts</a>
            <div class="justify-end ">
                <div class="col ">
                    <a class="btn btn-sm btn-success" href={{ route('posts.create') }}>Add Post</a>
                </div>
            </div>
    </nav>

    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Create a Post</h3>
                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">content</label>
                        <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Image">Add Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>

                    </div>
                    <br>
                    <fieldset>
                    <legend>Categories</legend>
                    @if (!empty($categories) && count($categories) > 0)
                    @foreach ($categories as $category)
                        <div>
                        <input type="checkbox" id="cat-{{ $category->id }}" name="categories[]" value="{{ $category->id }}">
                        <label for="cat-{{ $category->id }}">{{ $category->title }}</label>
                        </div>
                        @endforeach
                        @endif
                    </fieldset>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                    
                </form>
                

            </div>
        </div>
    </div>
</body>

</html>