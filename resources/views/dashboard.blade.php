@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1>Tableau de bord</h1>

<div class="dashboard-cards">
    <div class="card">
        <h3>Catégories</h3>
        <p>{{ $totalCategories }}</p>
    </div>
    <div class="card">
        <h3>Produits</h3>
        <p>{{ $totalProduits }}</p>
    </div>
    <div class="card">
        <h3>Quantité totale en stock</h3>
        <p>{{ $totalQuantite }}</p>
    </div>
    <div class="card">
        <h3>Nombre total de fournisseurs</h3>
        <p>{{ $totalFournisseurs }}</p>
    </div>
</div>

<h2>Produits récents</h2>
@if($produitsRecents->isEmpty())
    <p>Aucun produit récent.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Fournisseur</th>
                <th>Quantité</th>
                <th>Prix</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produitsRecents as $produit)
                <tr>
                    <td>{{ $produit->nom }}</td>
                    <td>{{ $produit->categorie->nom }}</td>
                    <td>{{ $produit->fournisseur->nom }}</td>
                    <td>{{ $produit->quantite }}</td>
                    <td>{{ number_format($produit->prix, 2, ',', ' ') }} FCFA</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif


<style>
    .dashboard-cards {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
}

.card {
    background-color: #f5f5f5;
    padding: 20px;
    border-radius: 8px;
    flex: 1;
    text-align: center;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.card h3 {
    margin-bottom: 10px;
    color: #333;
}

.card p {
    font-size: 24px;
    font-weight: bold;
    color: #007bff;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 10px;
}

table th {
    background-color: #007bff;
    color: #fff;
    text-align: left;
}
</style>
@endsection