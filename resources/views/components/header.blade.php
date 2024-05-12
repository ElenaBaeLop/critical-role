<link rel="stylesheet" href="/css/header.css">

<header class="header">
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
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                    <i class="arrow fa-solid fa-caret-down"></i>
                    {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu" style="display: none">
                    <a class="dropdown-profile" href="/profile/{{ Auth::user()->username }}">Profile</a>
                    <a class="dropdown-notification" href="/profile/{{ Auth::user()->username }}/notifications">Notifications</a>
                    <form action="/logout" method="POST" >
                        @csrf
                        <button type="submit" >Log Out</button>
                    </form>
                </div>
            </div>
            <script>
                // Obtener el número de notificaciones no leídas
                var unreadNotificationsCount = {{ auth()->user()->unreadNotifications->count() }};

                // Mostrar el número de notificaciones no leídas junto al botón y al enlace de notificaciones
                if (unreadNotificationsCount > 0) {
                    $(".dropdown-toggle").append('<a href="/profile/{{ Auth::user()->username }}/notifications" class=""><i class="fa-regular fa-bell"></i> ' + unreadNotificationsCount + '</a>');
                    $(".dropdown-notification").append('<span class=""><i class="fa-regular fa-bell"></i> ' + unreadNotificationsCount + '</span>');
                }

                $(".dropdown-toggle").click(function(){
                    $(".dropdown-menu").toggle();
                    $(".arrow").toggleClass("fa-caret-down fa-caret-up");
                });

                // Ocultar el menú desplegable cuando se hace clic en cualquier parte de la pantalla
                $(document).click(function(event) {
                    if(!$(event.target).closest('.dropdown').length) {
                        if($('.dropdown-menu').is(":visible")) {
                            $('.dropdown-menu').hide();
                        }
                    }
                });
            </script>
        @endauth
</header>

