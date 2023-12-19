<x-layout titre="Liste des Scènes">
    <div>
    <h1>Liste des Scènes</h1>
        <form action="{{route('scenes.index')}}" method="get">
            <div class="mb-3">
            <select name="cat">
                <option value="All" @if($cat == 'All') selected @endif>-- Toutes équipes --</option>
                @foreach($equipes as $equipe)
                    <option value="{{$equipe}}" @if($cat == $equipe) selected @endif>{{$equipe}}</option>
                @endforeach
            </select>
            </div>
            <input type="submit" value="OK">
        </form>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($scenes as $scene)
                <a href="{{ route('scenes.show', $scene['idScene']) }}">
                <div class="col mb-4">
                <div class="card bg-white border shadow">
                    <img src="{{ asset("storage/" . $scene->vignetteImage) }}" class="card-img-top" alt="Vignette de la Scène">
                    <div class="card-body">
                        <h5 class="card-title">{{ $scene->nom }}</h5>
                        <p class="card-text">
                            <strong>Équipe:</strong> {{ $scene->equipe }}<br>
                            <strong>Date d'Ajout:</strong> {{ $scene->created_at }}<br>
                        </p>
                    </div>
                </div>
                </div>
                </a>
            @endforeach
        </div>
    </div>
</x-layout>

