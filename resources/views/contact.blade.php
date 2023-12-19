<x-layout titre="Contact">
    <div class="container mt-5 bg-secondary rounded">
        <h1 class="mb-3 card-header">Contactez-nous</h1>
        <form method="post" action="{{ route('contact.submit') }}">
            @csrf
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control bg-white" id="prenom" name="prenom" required placeholder="Robert">
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control bg-white
                @error('nom') is-invalid @enderror" id="nom" name="nom" required placeholder="Duchmol">
                @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adresse Email</label>
                <input type="email" class="form-control bg-white @error('email')
                is-invalid @enderror" id="email" name="email" required placeholder="robertduchmol@email.fr">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control bg-white @error('message') is-invalid @enderror
                " id="message" name="message" rows="5" required placeholder="Un message sympa . . ."></textarea>
                @error('message')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mb-3">Envoyer</button>
        </form>
    </div>
</x-layout>
