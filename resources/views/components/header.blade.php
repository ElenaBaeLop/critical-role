<header class="">

    <div class="">
        <div>
            <a href="/">Home page</a>
            <a href="/create-campaign">Create campaign</a>
            <a href="/join-campaign">Join campaign</a>
        </div>
        @guest
            <div>
                <!--Register-->
                <a href="/register">Register</a>
                <!--Log in-->
                <a href="/login">Log in</a>
            </div>
        @endguest
        @auth
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/profile/{{ Auth::user()->username }}">Perfil</a>
                    <a href="">Notificaciones</a>
                    <form action="/logout" method="POST" class="header__options__button">
                        @csrf
                        <button type="submit" class="header__options__button__logout">Log Out</button>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</header>
