@guest
    <a href="{{ route('login') }}" class="nav-item nav-link text-white d-sm-block">Se connecter</a>
    <a href="{{ route('register') }}" class="nav-item nav-link text-white mx-5 d-sm-block">S'inscrire</a>

@endguest
@auth
    <x-banner><li>Bienvenue {{Auth::user()->name}}</li></x-banner>
    <a href="{{ route('logout') }}" class="nav-item nav-link text-white mx-5 d-sm-block">Logout</a>
    <script>document.getElementById('logout').addEventListener("click", (event) => {
        document.getElementById('logout-form').submit();});
    </script>
@endauth



