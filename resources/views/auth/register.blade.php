<x-layout titre="Inscription">
    <div class="row justify-content-center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-md-8">
            <div class="card bg-secondary text-white rounded-2">
                <div class="card-header d-flex align-items-center">
                    <img id="image-preview" class="avatar rounded-circle" style="height: 50px; width: 50px;"
                         alt="Image Preview" src="{{asset("storage/user/avatars/user.png")}}">
                    <h2 class="ms-3 mb-0">Inscription</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom ou Pseudo</label>
                            <input id="nom" type="text" class="form-control bg-white shadow
                             @error('nom') is-invalid @enderror"
                                   name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus
                                   placeholder="Duchmol">
                            @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <input id="email" type="email" class="form-control bg-white shadow
                             @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                   placeholder="robertduchmol@email.fr">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input id="exampleInputPassword1" type="password" class="form-control bg-white shadow
                             @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                            <input id="password_confirmation" type="password" class="form-control bg-white shadow
                             @error('password_confirmation') is-invalid @enderror"
                                   name="password_confirmation" autocomplete="new-password">
                            @error('password_confirmations')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="avatar" class="form-label">Avatar</label>
                            <input id="avatar" type="file" class="form-control bg-white shadow"
                                   name="avatar" accept="image/*">
                            <button type="button" class="btn btn-outline text-white" onclick="cancelImageUpload()">
                                Retirer le choix
                            </button>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">
                                S'inscrire
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(input) {
            var preview = document.getElementById('image-preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }

        function cancelImageUpload() {
            var input = document.getElementById('avatar');
            input.value = '';
            var preview = document.getElementById('image-preview');
            preview.src = '{{asset("storage/user/avatars/user.png")}}';
        }

        document.getElementById('avatar').addEventListener('change', function () {
            previewImage(this);
        });
    </script>
</x-layout>
