<x-layout titre="Accueil">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Bienvenue {{ Auth::user()->nom }}</h1>

        <div class="row mb-4">
            <div class="col-md-12">
                <h2>Vos favoris:</h2>
                @forelse(Auth::user()->favoris as $scene)
                    <p>{{ $scene->nom }}</p>
                @empty
                    <p>Aucun favori trouvé.</p>
                @endforelse
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <h2>Vos scènes:</h2>
                @forelse(Auth::user()->scenes as $scene)
                    <p>{{ $scene->nom }}</p>
                @empty
                    <p>Aucune scène trouvée.</p>
                @endforelse
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2>Vos commentaires:</h2>
                @forelse(Auth::user()->commentaires as $commentaire)
                    <p>{{ $commentaire->titre }}</p>
                @empty
                    <p>Aucun commentaire trouvé.</p>
                @endforelse
            </div>
        </div>

        <div class="col-md-6">
            <h2>Modifier votre avatar:</h2>
            <form action="{{ route('user.update-avatar') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="avatar" class="form-label">Choisir un nouvel avatar:</label>
                    <input type="file" class="form-control" id="avatar" name="avatar">
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour l'avatar</button>
            </form>
        </div>
    </div>
</x-layout>
