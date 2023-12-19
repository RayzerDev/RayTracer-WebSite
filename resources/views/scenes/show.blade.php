<x-layout titre="{{ $titre }}">
    @auth
        <div class="container mt-3 bg-dark rounded-4 p-3">
            <h1 class="text-center">Le détail d'une scene</h1>
        <div class="container mt-5">
            <p><strong>Le nom de la scene :</strong> {{ $scene['nom'] }}</p>
            <form method="POST" action="{{ route('favoris.toggle', ['scene' => $scene->id]) }}" class="text-center">
                @csrf
                @method('PUT')

                <button type="submit" class="btn {{ Auth::user()->isFavorite($scene->id) ? 'btn-danger' : 'btn-primary' }}">
                    {{ Auth::user()->isFavorite($scene->id) ? 'Retirer des favoris' : 'Ajouter aux favoris' }}
                </button>
            </form>

            <form action="{{ route('notes.store') }}" method="post" class="text-center mt-5">
                @csrf
                <input type="hidden" name="idScene" value="{{ $scene->id }}">
                <label for="note">Donner une note:</label>
                <input type="number" name="note" min="0" max="5" required>
                <button type="submit">Enregistrer</button>
            </form>
            @if (App\Models\Note::where('idUser', Auth::user()->id)->count() > 0)
                <h3 class="text-center">Votre note:</h3>
                <p class="text-center">Vous avez donné une note de {{ App\Models\Note::where('idUser', Auth::user()->id)->first()->note }}.</p>

            @else
                <p class="text-center fst-italic">Vous n'avez pas encore noté cette scene.</p>
            @endif

            <p><strong>le format de la scene:</strong><pre><code>{!! $scene->format !!}</code></pre></p>
            <p><strong>La date d'ajout :</strong> {{ $scene['created_at'] }}</p>
            <p><strong>L'équipe :</strong> {{ $scene['equipe'] }}</p>
            <p><strong>La description de la scene :</strong> {!! $parseDown->parse($scene['description']) !!}</p>
            <img src="{{ asset('storage/'.$scene['image']) }}" alt="Image de la scène">
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
                        <div class="d-flex flex-start mt-4">
                            <img class="rounded-circle shadow-1-strong me-3"
                                 src="{{asset("storage/" . $commentaire->user->avatar)}}" alt="avatar" width="65"
                                 height="65" />
                            <div class="flex-grow-1 flex-shrink-1">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-1">
                                            {{$commentaire->user->nom}} <span class="small">- {{$commentaire->titre}} </span>
                                        </p>
                                    </div>
                                    <p class="small mb-0">
                                        {{$commentaire->corp}}
                                    </p>
                                </div>
                            </div>
                        </div>

                    @empty
                        <p>Aucun commentaire.</p>
                    @endforelse
                </div>
            </div>
        </div>
    @endauth
    @guest
        <div class="container mt-5 rounded-4">
            <h1 class="text-center">Le détail d'une scene</h1>
            <div class="container mt-5">
                <h1>Le détail d'une scene</h1>

            <p><strong>Le nom de la scene :</strong> {{ $scene['nom'] }}</p>
            <p><strong>la description :</strong>{{ $scene['description'] }}</p>
            <p><strong>La date d'ajout :</strong> {{ $scene['created_at'] }}</p>
            <p><strong>l'équipe :</strong> {{ $scene['equipe'] }}</p>
            <p><strong>la description de la scene :</strong> {!! $parseDown->parse($scene['format']) !!}</p>
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
            </div>
                <p><strong>la note moyenne de la scène :</strong> {{ \App\Models\Note::where('idScene', $scene['id'])->avg('note') }}</p>
            <div class="col-md-12">
                <h2>Les commentaires:</h2>
                <div class="row">
                    @forelse($scene->commentaires as $commentaire)
                        <div class="d-flex flex-start mt-4">
                            <img class="rounded-circle shadow-1-strong me-3"
                                 src="{{asset("storage/" . $commentaire->user->avatar)}}" alt="avatar" width="65"
                                 height="65" />
                            <div class="flex-grow-1 flex-shrink-1">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-1">
                                            {{$commentaire->user->nom}} <span class="small">- {{$commentaire->titre}} </span>
                                        </p>
                                    </div>
                                    <p class="small mb-0">
                                        {{$commentaire->corp}}
                                    </p>
                                </div>
                            </div>
                        </div>

                    @empty
                        <p>Aucun commentaire.</p>
                    @endforelse
                </div>
            </div>
    @endguest
</x-layout>
