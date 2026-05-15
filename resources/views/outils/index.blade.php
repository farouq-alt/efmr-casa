@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Liste des Outils IA</h1>
    <a href="{{ route('outils.create') }}" class="btn btn-primary">Ajouter un Outil</a>
</div>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Site URL</th>
            <th>Catégorie</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($outils as $outil)
        <tr>
            <td>{{ $outil->id }}</td>
            <td>{{ $outil->nom }}</td>
            <td>{{ Str::limit($outil->description, 50) }}</td>
            <td><a href="{{ $outil->site_url }}" target="_blank">{{ $outil->site_url }}</a></td>
            <td>{{ $outil->categorie->nom }}</td>
            <td>
                <a href="{{ route('outils.show', $outil) }}" class="btn btn-sm btn-info">Voir</a>
                <a href="{{ route('outils.edit', $outil) }}" class="btn btn-sm btn-warning">Modifier</a>
                <form action="{{ route('outils.destroy', $outil) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Aucun outil trouvé</td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- Pagination -->
<div class="d-flex justify-content-center">
    {{ $outils->links() }}
</div>
@endsection
