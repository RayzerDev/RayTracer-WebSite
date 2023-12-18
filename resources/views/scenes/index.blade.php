<x-layout titre="Liste des Scènes">
<div>
    <h1>Liste des Scènes</h1>
    <ul>
        <form method="GET" action="{{ route('scenes.index') }}">
            <label for="team">Choisir une Équipe:</label>
            <select name="team" id="team">
                <option value="">Toutes les équipes</option>
                @foreach ($equipes as $equipe)
                    <option value="{{ $equipe }}" {{ $selectedTeam == $equipe ? 'selected' : '' }}>{{ $equipe }}</option>
                @endforeach
            </select>
            <button type="submit">Filtrer</button>
        </form>
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

