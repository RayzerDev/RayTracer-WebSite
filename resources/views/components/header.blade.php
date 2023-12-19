@guest
    <a href="{{ route('login') }}" class="nav-item nav-link text-white d-sm-block">Se connecter</a>
    <a href="{{ route('register') }}" class="nav-item nav-link text-white mx-5 d-sm-block">S'inscrire</a>

@endguest
@auth
    <a href="{{ route('home') }}" class="nav-item nav-link text-white d-sm-block">Bienvenue {{Auth::user()->nom}}</a>
    <a href="#" id="logout" class="nav-item nav-link text-white mx-5 d-sm-block">Logout</a>
    <span class="material-symbols-outlined">account_circle</span>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    <script>document.getElementById('logout').addEventListener("click", (event) => {
        document.getElementById('logout-form').submit();});
    </script>
@endauth



