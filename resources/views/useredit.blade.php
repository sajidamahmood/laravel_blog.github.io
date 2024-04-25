<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>CRUD user</title>
</head>

<body>
  

    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Add user</h3>
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <textarea class="form-control" id="email" name="email" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="role">role</label>
                        <textarea class="form-control" id="role" name="role" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <textarea class="form-control" id="password" name="password" rows="3" required></textarea>
                    </div>
                    <br>
                    <fieldset>
                    <legend>Categories</legend>
                    @if (!empty($categories) && count($categories) > 0)
                    @foreach ($categories as $category)
                        <div>
                            <input type="checkbox" id="cat-{{ $category->id }}" name="categories[]" value="{{ $category->id }}" />
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