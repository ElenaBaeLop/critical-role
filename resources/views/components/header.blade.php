<header class="">

    <div class="">
        <div>
            <a href="/createCampaign">Create campaign</a>
            <a href="/joinCampaign">Join campaign</a>
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
        <!--Logout-->
        <form action="/logout" method="POST" class="header__options__button">
            @csrf
            <button type="submit" class="header__options__button__logout">Log Out</button>
        </form>
        @endauth
    </div>
</header>
