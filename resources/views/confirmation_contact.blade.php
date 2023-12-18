<x-layout titre="Confirmation de Contact">
    <div class="container mt-5">
        <h1>Merci pour votre message !</h1>

        <p><strong>Prénom:</strong> {{ $prenom }}</p>
        <p><strong>Nom:</strong>{{ $nom }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Message:</strong> {{ $message }}</p>
    </div>
</x-layout>
