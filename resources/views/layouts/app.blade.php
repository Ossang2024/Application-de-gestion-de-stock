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
            <a href="/">Gestion de Stock</a>
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
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 Gestion de Stock. Tous droits réservés.</p>
    </footer>
</body>
</html>