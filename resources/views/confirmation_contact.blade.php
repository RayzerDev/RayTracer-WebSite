<x-layout titre="Confirmation de Contact">
    <div class="container mt-5">
        <h1>Merci pour votre message {{$prenom}} !</h1>
        <div class="fs-4">
            Nous allons le traiter sous peu. <br>Vous recevrez une réponse à l'adresse {{$email}}.
        </div>
        <div class="mt-3 text-center">
            <a href="/" class="btn btn-primary">Retour</a>
        </div>
    </div>
</x-layout>
