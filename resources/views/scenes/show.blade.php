<x-layout titre="{{ $titre }}">
        <div class="container mt-3 bg-dark rounded-4 p-3">
            <h1 class="text-center">{{$scene['nom']}}</h1>
        <div class="container mt-5">
            <img src="{{ asset('storage/'.$scene['image']) }}" alt="Image de la scène">
            @auth
            <form method="POST" action="{{ route('favoris.toggle', ['scene' => $scene->id]) }}" class="text-center">
                @csrf
                @method('PUT')

                <button type="submit" class="btn {{ Auth::user()->isFavorite($scene->id) ? 'btn-danger' : 'btn-primary' }}">
                    {{ Auth::user()->isFavorite($scene->id) ? 'Retirer des favoris' : 'Ajouter aux favoris' }}
                </button>
            </form>


            @if ($scene->noteUser(Auth::user()->id))
                <h3 class="">Votre note:</h3>
                <p class="">Vous avez donné {{$scene->noteUser(Auth::user()->id)["note"]}}.</p>
                    <form action="{{ route('notes.update', ["id" => $scene->noteUser(Auth::user()->id)->id, "scene" => $scene]) }}" method="post" class="mt-5">
                    @csrf
                    @method('PUT')
                    <label for="note">Donner une note:</label>
                    <input type="number" name="note" min="0" max="5" required>
                    <button type="submit">Enregistrer</button>
                </form>

            @else
                <p class="fst-italic">Vous n'avez pas encore noté cette scene.</p>
                <form action="{{ route('notes.store', ["scene" => $scene]) }}" method="post" class="mt-5">
                    @csrf
                    <label for="note">Donner une note:</label>
                    <input type="number" name="note" min="0" max="5" required>
                    <button type="submit">Enregistrer</button>
                </form>
            @endif
                <p><strong>le format de la scene:</strong><pre class="bg-secondary"><code>{!! $scene->format !!}</code></pre></p>
            @endauth

            <p><strong>La date d'ajout :</strong> {{ $scene['created_at'] }}</p>
            <p><strong>L'équipe :</strong> {{ $scene['equipe'] }}</p>
            <p><strong>La description de la scene :</strong> {!! $parseDown->parse($scene['description']) !!}</p>

            </div>
        <div class="container">
            <x-stats>
                <x-slot name="noteMoy">
                    {{ $moyNote}}
                </x-slot>
                <x-slot name="noteMax">
                    {{ $maxNote }}
                </x-slot>
                <x-slot name="noteMin">
                    {{ $minNote }}
                </x-slot>
                <x-slot name="nbNotes">
                    {{ $nbNotes }}
                </x-slot>
                <x-slot name="nbfav">
                    {{ $nbFav }}
                </x-slot>
            </x-stats>
            <div class="col-md-12">
                <h2>Les commentaires:</h2>
                <div class="row">
                    @forelse($scene->commentaires as $commentaire)
                        <x-commentaire :commentaire="$commentaire"></x-commentaire>
                    @empty
                        <p>Aucun commentaire.</p>
                    @endforelse
                </div>
                @auth
                <div class="mt-4">
                    <h3>Ajouter un commentaire:</h3>
                    <form method="post" action="{{ route('commentaire.store', ["scene" => $scene]) }}">
                        @csrf
                        <input type="text" class="form-control mb-3 bg-white" name="titre" rows="4" placeholder="Le titre"></input>
                        <textarea class="form-control mb-3 bg-white" name="corp" rows="4" placeholder="Votre commentaire"></textarea>
                        <button type="submit" class="btn btn-primary">Ajouter le commentaire</button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
    </div>
</x-layout>
