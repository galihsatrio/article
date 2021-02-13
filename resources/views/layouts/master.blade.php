<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@300&display=swap" rel="stylesheet">

    <title>@yield('title')</title>
  </head>
  <body style="font-family: Inria Sans">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container my-2">
            <a class="navbar-brand" href="/article">Article</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active mx-2">
                  <a class="nav-link" href="/">Article</a>
                </li>
                @guest
                <li class="nav-item active mx-2">
                  <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item active mx-2">
                  <a class="nav-link" href="/register">Register</a>
                </li>
                @endguest
                @auth
                <li class="nav-item dropdown mx-2 active">
                    <a class="nav-link dropdown-toggle" href="#" id="category" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Author
                    </a>
                    <div class="dropdown-menu" aria-labelledby="user">
                        @foreach( $users = \App\User::all(); as $user )
                          <a class="dropdown-item" href="/article/author/{{ $user->name }}">{{ $user->name }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown mx-2 active">
                    <a class="nav-link dropdown-toggle" href="#" id="category" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="user">
                        @foreach( $categories = \App\Category::all(); as $category )
                          <a class="dropdown-item" href="/article/{{ $category->name }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown mx-2 active">
                    <a class="nav-link dropdown-toggle" href="#" id="user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="category">
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </li>

                @endauth
              </ul>
            </div>
        </div>
      </nav>

    @yield('content')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
