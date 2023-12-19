<x-layout titre="Accueil">
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <h1 class="text-center">Bienvenue  {{Auth::user()->nom}} !<br>Voici la page d'accueil pour les utilisateurs connectés</h1>
    </div>
</x-layout>
