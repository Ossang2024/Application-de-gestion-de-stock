@extends('layouts.app')

@section('title', 'Détails du Produit')

@section('content')
    <a href="{{ route('produits.index') }}">← Retour à la liste</a>
    <a href="{{ route('produits.edit', $produit->id) }}">Modifier le produit</a>

    <h1>{{ $produit->nom }}</h1>
    <p><strong>Catégorie :</strong> {{ $produit->categorie->nom }}</p>
    <p><strong>Fournisseur :</strong> {{ $produit->fournisseur ? $produit->fournisseur->nom : 'N/A' }}</p>
    <p><strong>Quantité :</strong> {{ $produit->quantite }}</p>
    <p><strong>Prix :</strong> {{ number_format($produit->prix, 2, ',', ' ') }} FCFA</p>
    <p><strong>Description :</strong> {{ $produit->description ?? 'Aucune description' }}</p>

    <h2>Sorties de Stock</h2>
    @if($sorties->isEmpty())
        <p>Aucune sortie de stock pour ce produit.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Quantité</th>
                    <th>Motif</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sorties as $sortie)
                    <tr>
                        <td>{{ $sortie->created_at->format('d/m/Y') }}</td>
                        <td>{{ $sortie->quantite }}</td>
                        <td>{{ $sortie->motif }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection