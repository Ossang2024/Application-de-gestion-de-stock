@extends('layouts.app')

@section('title', 'Liste des Catégories')

@section('content')
    <a href="{{ route('categories.create') }}">Ajouter une catégorie</a>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $categorie)
                <tr>
                    <td>{{ $categorie->id }}</td>
                    <td>{{ $categorie->nom }}</td>
                    <td>{{ $categorie->description }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $categorie->id) }}">Modifier</a>
                        <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection