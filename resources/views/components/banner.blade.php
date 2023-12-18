<nav class="navbar navbar-expand-lg navbar-light bg-dark text-white w-100">
    <div class="collapse navbar-collapse">
        <div class="navbar-nav text-white mx-5">
            <a class="nav-item nav-link text-white" href="/a-propos">A propos</a>
            <a class="nav-item nav-link text-white" href=""></a>
            <a class="nav-item nav-link text-white" href="/contact">Contact</a>
            @auth
                <a class="nav-item nav-link text-white" href="/home">Home</a>
            @endauth
        </div>
    </div>
    <x-header></x-header>
</nav>
