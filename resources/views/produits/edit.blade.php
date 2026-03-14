@extends('layouts.app')

@section('title', 'Modifier Produit')

@section('content')
    <a href="{{ route('produits.index') }}">Retour à la liste</a>

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produits.update', $produit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nom :</label>
        <input type="text" name="nom" value="{{ $produit->nom }}" required><br><br>

        <label>Catégorie :</label>
        <select name="categorie_id" required>
            @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}" {{ $produit->categorie_id == $categorie->id ? 'selected' : '' }}>
                    {{ $categorie->nom }}
                </option>
            @endforeach
        </select><br><br>

        <label>Fournisseur :</label>
        <select name="fournisseur_id" required>
            @foreach($fournisseurs as $fournisseur)
                <option value="{{ $fournisseur->id }}" {{ $produit->fournisseur_id == $fournisseur->id ? 'selected' : '' }}>
                    {{ $fournisseur->nom }}
                </option>
            @endforeach
        </select><br><br>

        <label>Quantité :</label>
        <input type="number" name="quantite" value="{{ $produit->quantite }}" min="0" required><br><br>

        <label>Prix :</label>
        <input type="number" name="prix" value="{{ $produit->prix }}" step="0.01" min="0" required><br><br>

        <label>Description :</label>
        <textarea name="description">{{ $produit->description }}</textarea><br><br>

        <button type="submit">Modifier</button>
    </form>
@endsection