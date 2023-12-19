<x-layout titre="aPropos">
    <h1 class="text-center">A propos</h1>
    <section class="mt-4">
        <h2>A propos du RayTracer Website</h2>
        <p>
            Pour notre projet, nous commençons par utiliser SQLite pour gérer nos données.
            En ce qui concercne l'authentification :
        </p>
        <ul>
            <li>Les utilisateurs peuvent créer un compte</li>
            <li>Les utilisateurs peuvent se connecter</li>
        </ul>
        <p>
            Nous utilisons Fortify pour gérer l'authentification. Il fait le travail sans compliquer les choses,
            même si nous devrons construire nos propres vues de connexion et d'enregistrement.
        </p>
        <p>
            Après avoir mis en place le projet,
            nous avons configuré Bootstrap pour donner du style en se simplifiant les choses.
            Cette étape nous aidera à créer efficacement des données
            de test.
        </p>
        <div class="text-center">
            <img src="{{asset('img/raytracerapropos.png')}}" alt="raytracer" class="w-25 rounded-2">
        </div>
    </section>
</x-layout>
<x-footer></x-footer>
