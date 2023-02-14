<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>{{$pageTitle}}</title>
    @vite(['resources/sass/app.scss'])
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MYSHOP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Доставка</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Бренды</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Каталог</a>
                    </li>
                </ul>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if(!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Войти</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <label for="logout" class="nav-link cursor-pointer">Выйти</label>
                                <input id="logout" type="submit" class="d-none" href="{{route('logout')}}" value="Выйти">
                            </form>

                        </li>
                    @endif
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>
@yield('content')
</body>
</html>

