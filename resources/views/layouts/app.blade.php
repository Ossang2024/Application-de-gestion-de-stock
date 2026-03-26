<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header>
    <h1>
        <a href="{{ route('dashboard') }}">Gestion de Stock</a>
    </h1>

    <nav>
        <ul>
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">Catégories</a>
                </li>
                <li>
                    <a href="{{ route('produits.index') }}" class="{{ request()->routeIs('produits.*') ? 'active' : '' }}">Produits</a>
                </li>

            @auth
                <li>{{ Auth::user()->name }}</li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Déconnexion</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}">Connexion</a></li>
            @endauth
        </ul>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <p>© Gestion de Stock</p>
</footer>

</body>
</html>