<nav class="navbar navbar-expand-lg bg-body-secondary shadow fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('homepage')}}">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('article.index')}}">Articoli</a>
                </li>
                @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('login') }}">accedi</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">registrati</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            ciao {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.querySelector('#logout').submit();">Logout</a>
                            </li>
                            <form action="{{ route('logout') }}" method="post" id="logout">@csrf</form>
                            <li><a class="dropdown-item" href="{{ route('article.create') }}">crea</a></li>

                            @if (Auth::user()->is_revisor)
                                <li><a class="dropdown-item" href="{{ route('revisor.index') }}">Revisor</a></li>
                            @endif

                        </ul>
                    </li>
                @endguest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categorie
                    </a>
                    <ul class="dropdown-menu text-center">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('byCategory', compact('category')) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Cambio lingua
                    </a>
                    <ul class="dropdown-menu text-center">

                        <x-_locale lang="it" />
                        <x-_locale lang="es" />
                        <x-_locale lang="en" />
                    </ul>
                </li>

            </ul>
            <form class="d-flex" role="search" method="GET" action="{{route('article.search')}}">
                <input class="form-control me-2" type="search" name="searched" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
