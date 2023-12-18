@guest
    <a href="{{ route('login') }}" class="nav-item nav-link text-white mx-5">Login</a>
@endguest
@auth
    <x-banner><li>Bienvenue {{Auth::user()->name}}</li></x-banner>
    <a href="{{ route('logout') }}" class="nav-item nav-link text-white mx-5">Logout</a>
    <script>document.getElementById('logout').addEventListener("click", (event) => {
        document.getElementById('logout-form').submit();});
    </script>
@endauth



