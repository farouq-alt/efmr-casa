@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h2>{{ $outil->nom }}</h2>
    </div>
    <div class="card-body">
        <p><strong>Description:</strong> {{ $outil->description }}</p>
        <p><strong>Site URL:</strong> <a href="{{ $outil->site_url }}" target="_blank">{{ $outil->site_url }}</a></p>
        <p><strong>Catégorie:</strong> {{ $outil->categorie->nom }}</p>
        <p><strong>Créé le:</strong> {{ $outil->created_at->format('d/m/Y H:i') }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('outils.index') }}" class="btn btn-secondary">Retour</a>
        <a href="{{ route('outils.edit', $outil) }}" class="btn btn-warning">Modifier</a>
    </div>
</div>
@endsection
