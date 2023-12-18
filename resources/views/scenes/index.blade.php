<x-layout titre="Liste des Scènes">
<div>
    <h1>Liste des Scènes</h1>
    <ul>
        @foreach ($scenes as $scene)
            <li>
                <strong>Nom de la Scène:</strong> {{ $scene->nomScene }}<br>
                <strong>Équipe:</strong> {{ $scene->equipe }}<br>
                <strong>Date d'Ajout:</strong> {{ $scene->dateAjout }}<br>
                <strong>Vignette:</strong> {{ $scene->lienVignetteImage }}>
            </li>
            <br>
        @endforeach
    </ul>
</div>
</x-layout>

