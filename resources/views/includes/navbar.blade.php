<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <img class="h-8 w-8 mr-3" src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('posts.index') }}">Home</a> <!-- Added d-flex and align-items-center -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Posts
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item {{ Route::is('posts.index') ? 'active' : '' }}" href="{{ route('posts.index') }}">Posts List</a>
                        <a class="dropdown-item {{ Route::is('posts.create') ? 'active' : '' }}" href="{{ route('posts.create') }}">New Post</a>
                        <a class="dropdown-item {{ Route::is('posts.trash') ? 'active' : '' }}" href="{{ route('posts.trash') }}">Trash</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUsers" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Users
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownUsers">
                    <a class="dropdown-item {{ Route::is('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}">Users List</a>
                </div>
            </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>