<x-layout titre="Contactez-nous">
    <div class="container mt-5">
        <h1>Contactez-nous</h1>

        <form method="post" action="{{ route('contact.submit') }}">
            @csrf

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control text-white" id="prenom" name="prenom" required>

            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control text-white" id="nom" name="nom" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adresse Email</label>
                <input type="email" class="form-control text-white" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control text-white" id="message" name="message" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</x-layout>
