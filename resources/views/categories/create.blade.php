@extends('layouts.app')

@section('title', 'Ajouter une Catégorie')

@section('content')
    <h1>Ajouter une Catégorie</h1>

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

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label>Nom :</label>
        <input type="text" name="nom" required>
        <br><br>
        <label>Description :</label>
        <textarea name="description"></textarea>
        <br><br>
        <button type="submit">Ajouter</button>
    </form>
@endsection