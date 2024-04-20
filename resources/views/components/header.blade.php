<style>
    /* Estilos para el encabezado */
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        background-color: #f0f0f0;
    }

    /* Estilos para los enlaces */
    header a {
        text-decoration: none;
        color: #333;
        margin-right: 20px;
    }

    /* Estilos para el botón de registro y inicio de sesión */
    header .guest-links {
        display: flex;
    }

    /* Estilos para el botón de perfil del usuario */
    header .dropdown {
        position: relative;
    }

    /* Estilos para el botón de perfil del usuario */
    header .dropdown-toggle {
        background: none;
        border: none;
        cursor: pointer;
    }

    /* Estilos para el menú desplegable del usuario */
    header .dropdown-menu {
        position: absolute;
        top: 100%;
        right: 0;
        background-color: #fff;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        padding: 10px;
        display: none;
    }

    /* Estilos para los enlaces dentro del menú desplegable */
    header .dropdown-menu a {
        display: block;
        padding: 8px 12px;
        color: #333;
        text-decoration: none;
    }

    /* Estilos para el botón de cerrar sesión */
    header .dropdown-menu form {
        margin-top: 10px;
    }

    /* Estilos para el botón de cerrar sesión */
    header .dropdown-menu button {
        background: none;
        border: none;
        cursor: pointer;
        color: #333;
        padding: 8px 12px;
        text-decoration: none;
    }

</style>

<header class="">
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
                    {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu" style="display: none">
                    <a class="dropdown-profile" href="/profile/{{ Auth::user()->username }}">Perfil</a>
                    <a class="dropdown-notification" href="/profile/{{ Auth::user()->username }}/notifications">Notificaciones</a>
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

