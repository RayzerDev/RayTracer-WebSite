<x-layout titre="Se connecter">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card bg-white">
                <div class="card-header">
                    <h2>Connexion</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <input id="email" type="email" class="form-control bg-white shadow"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input id="password" type="password" class="form-control bg-white shadow"
                                   name="password" required autocomplete="current-password">
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Se souvenir de moi</label>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">
                                Se connecter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
