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
                @auth
                    @if(auth()->user() && auth()->user()->id === $commentaire->user->id)
                        <div class="btn-group" role="group" aria-label="Options">
                            <a class="btn btn-sm btn-secondary" href="{{ route('commentaires.edit', ['commentaire' => $commentaire]) }}">Modifier</a>
                            <form method="post" action="{{ route('commentaires.destroy', ['commentaire' => $commentaire]) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
            <p class="small mb-0">
                {{$commentaire->corp}}
            </p>
        </div>
    </div>
</div>
