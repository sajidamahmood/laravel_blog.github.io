<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>categories</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1">Categories</a>
            <div class="justify-end ">
                <div class="col ">
                    <a class="btn btn-sm btn-success"></a>
                </div>
            </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
        @foreach ($categories as $category)
        <div class="col-sm">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">{{ $category->title }}</h5>
            </div>
            <div class="card-body">
              @if(!empty($category->user->name))
              <p class="card-text">by {{ $category->user->name }}</p>
              @endif
              <p class="card-text">{{ $category->body }}</p>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-sm">
                  <a href="{{ route('categories.edit', $category->id) }}"
            class="btn btn-primary btn-sm">Edit</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</body>

</html>

