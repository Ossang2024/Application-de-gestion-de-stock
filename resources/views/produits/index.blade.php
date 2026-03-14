@extends('layouts.app')

@section('title', 'Liste des Produits')

@section('content')
    <h1>Liste des Produits</h1>

    @auth
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('produits.create') }}">Ajouter un produit</a>
            {{-- <a href="{{ route('produits.edit', $produit->id) }}">Modifier</a>
            <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form> --}}
        @endif
    @endauth

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Fournisseur</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produits as $produit)
                <tr>
                    <td>{{ $produit->id }}</td>
                    <td>{{ $produit->nom }}</td>
                    <td>{{ $produit->categorie->nom }}</td>
                    <td>{{ $produit->fournisseur->nom }}</td>
                    <td>{{ $produit->quantite }}</td>
                    <td>{{ number_format($produit->prix, 2, ',', ' ') }} FCFA</td>
                    <td>
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('produits.create') }}">Ajouter un produit</a>
                                <a href="{{ route('produits.edit', $produit->id) }}">Modifier</a>
                                <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Supprimer</button>
                                </form>
                            @endif
                        @endauth
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection