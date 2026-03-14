@extends('layouts.app')

@section('title', 'Modifier une Catégorie')

@section('content')
    <h1>Modifier une Catégorie</h1>

    <a href="{{ route('categories.index') }}">Retour à la liste</a>

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $categorie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nom :</label>
        <input type="text" name="nom" value="{{ $categorie->nom }}" required>
        <br><br>
        <label>Description :</label>
        <textarea name="description">{{ $categorie->description }}</textarea>
        <br><br>
        <button type="submit">Modifier</button>
    </form>
@endsection