<x-layout titre="Accueil">
    <style>
        .custom-button {
            background-color: #f8f9fa !important;
            color: #343a40 !important;
            padding: 5px 15px !important;
            border: 1px solid #ced4da !important;
            border-radius: 10px !important;
            cursor: pointer !important;
        }

        .custom-button:hover {
            background-color: #e9ecef !important;
        }
        .col:hover {
            transform: scale(1.01);
        }
    </style>
    <script>
        function submitForm() {
            document.getElementById("filterForm").submit();
        }
    </script>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Bienvenue {{ Auth::user()->nom }}</h1>

        <div class="row mb-4 text-center">
            <div class="col-md-12">
                <div class="btn-group" role="group" aria-label="Mini menu">
                    <button type="button" class="btn btn-secondary active" data-section="favoris">Vos favoris</button>
                    <button type="button" class="btn btn-secondary" data-section="scenes">Vos scènes</button>
                    <button type="button" class="btn btn-secondary" data-section="commentaires">Vos commentaires</button>
                    <button type="button" class="btn btn-secondary" data-section="avatar">Modifier votre avatar</button>
                </div>
            </div>
        </div>

        <div class="row mb-4" id="section-favoris">
            <div class="col-md-12">
                <h2>Vos favoris:</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
                @forelse(Auth::user()->favoris as $scene)
                    <a href="{{ route('scenes.show', $scene->id) }}" class="text-decoration-none">
                        <div class="col mb-4">
                            <div class="card bg-white border shadow">
                                <img src="{{ asset("storage/" . $scene->vignetteImage) }}" class="card-img-top img-fluid" alt="Vignette de la Scène">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $scene->nom }}</h5>
                                    <p class="card-text">
                                        <strong>Équipe:</strong> {{ $scene->equipe }}<br>
                                        <strong>Date d'Ajout:</strong> {{ $scene->created_at }}<br>
                                        @if(isset($scene->average_rating) && $scene->average_rating > 0)
                                            <strong>Note moyenne:</strong> {{ $scene->average_rating }}<br>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <p>Aucun favori trouvé.</p>
                @endforelse
                </div>
            </div>
        </div>

        <div class="row mb-4" id="section-scenes">
            <div class="col-md-12">
                <h2>Vos scènes:</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
                @forelse(Auth::user()->scenes as $scene)
                    <a href="{{ route('scenes.show', $scene->id) }}" class="text-decoration-none">
                        <div class="col mb-4">
                            <div class="card bg-white border shadow">
                                <img src="{{ asset("storage/" . $scene->vignetteImage) }}" class="card-img-top img-fluid" alt="Vignette de la Scène">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $scene->nom }}</h5>
                                    <p class="card-text">
                                        <strong>Équipe:</strong> {{ $scene->equipe }}<br>
                                        <strong>Date d'Ajout:</strong> {{ $scene->created_at }}<br>
                                        @if(isset($scene->average_rating) && $scene->average_rating > 0)
                                            <strong>Note moyenne:</strong> {{ $scene->average_rating }}<br>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <p>Aucune scène trouvée.</p>
                @endforelse
            </div>
            </div>
        </div>

        <div class="row" id="section-commentaires">
            <div class="col-md-12">
                <h2>Vos commentaires:</h2>
                @forelse(Auth::user()->commentaires as $commentaire)
                    <p>{{ $commentaire->titre }}</p>
                @empty
                    <p>Aucun commentaire trouvé.</p>
                @endforelse
            </div>
        </div>

        <div class="row" id="section-avatar">
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
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#section-scenes, #section-commentaires, #section-avatar").hide();

            $(".btn-group .btn").click(function () {
                var selectedSection = $(this).data("section");
                $(".btn-group .btn").removeClass("active");
                $("#section-favoris, #section-scenes, #section-commentaires, #section-avatar").hide();
                $(this).addClass("active");
                $("#section-" + selectedSection).show();
            });

        });
    </script>
</x-layout>
