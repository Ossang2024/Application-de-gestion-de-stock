@extends('layouts.app')

@section('title', 'Ajouter un Produit')

@section('content')
    <a href="{{ route('produits.index') }}">← Retour à la liste</a>

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produits.store') }}" method="POST">
        @csrf
        <label>Nom :</label>
        <input type="text" name="nom" value="{{ old('nom') }}" required><br><br>

        <label>Catégorie :</label>
        <select name="categorie_id" required>
            <option value="">-- Sélectionner --</option>
            @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
            @endforeach
        </select><br><br>

        <label>Fournisseur :</label>
        <select name="fournisseur_id" required>
            <option value="">-- Sélectionner --</option>
            @foreach($fournisseurs as $fournisseur)
                <option value="{{ $fournisseur->id }}">{{ $fournisseur->nom }}</option>
            @endforeach
        </select><br><br>

        <label>Quantité :</label>
        <input type="number" name="quantite" value="{{ old('quantite', 0) }}" min="0" required><br><br>

        <label>Prix :</label>
        <input type="number" name="prix" value="{{ old('prix', 0) }}" step="0.01" min="0" required><br><br>

        <label>Description :</label>
        <textarea name="description">{{ old('description') }}</textarea><br><br>

        <button type="submit">Ajouter</button>
    </form>
@endsection