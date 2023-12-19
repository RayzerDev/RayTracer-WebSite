<x-layout titre="Liste des Scènes">
<div>
    <h1>Liste des Scènes</h1>
    <ul>
        <form action="{{route('scenes.index')}}" method="get">
            <select name="cat">
                <option value="All" @if($cat == 'All') selected @endif>-- Toutes équipes --</option>
                @foreach($equipes as $equipe)
                    <option value="{{$equipe}}" @if($cat == $equipe) selected @endif>{{$equipe}}</option>
                @endforeach
            </select>
            <input type="submit" value="OK">
        </form>

        <div class="scene-cards">
            @foreach ($scenes as $scene)
                <div class="card">
                    <img src="{{ $scene->vignetteImage }}" alt="Vignette de la Scène">
                    <div class="card-body">
                        <h5 class="card-title">{{ $scene->nom }}</h5>
                        <p class="card-text">
                            <strong>Équipe:</strong> {{ $scene->equipe }}<br>
                            <strong>Date d'Ajout:</strong> {{ $scene->created_at }}<br>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </ul>
</div>
</x-layout>

