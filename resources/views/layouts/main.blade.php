<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>@yield("title")</title>
</head>
<body>
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-3">
                <ul class="nav flex-column">
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.index') }}">My Expenses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('expenses.index') }}">All Expenses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bookmarks.index') }}">Bookmarks</a>
                        </li>
                        <li class="nav-item">
                            <form method="post" action="{{ route('auth.logout') }}">
                                @csrf
                                <button type="submit" class="btn nav-link"> Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registration.index') }}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('expenses.index') }}">All Expenses</a>
                        </li>
                    @endif
                 </ul>
             </div>
             <div class="col-9">
                <header>
                    <h2>@yield("title")</h2>
                </header>
                <main>
                    @yield("content")
                </main>
            </div>
        </div>
    </div>
</body>
</html>