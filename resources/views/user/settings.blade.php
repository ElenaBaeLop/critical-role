<x-layout>
    <link rel="stylesheet" href="/css/user-settings.css">
    <section class="edit-user-wrapper">
        <div class="details-wrapper">
            <h1 class="title">{{ ucfirst($user->username) }}</h1>
            <p class="tiny-text">
                Active since
                {{ $user->created_at }}</p>
        </div>
        <!-- Formulario para cambiar el discord tag -->
        <form action="/profile/{{ $user->username }}/edit-discord" method="POST" class="form-edit">
            <!-- Titulo del formulario -->
            <h2 class="info-title">Discord tag:</h2>
            @method('PATCH')
            @csrf
            <input type="text" name="discord_tag" id="discord_tag" value="@if($user->discord_tag){{$user->discord_tag}}@else{{old('discord_tag')}}@endif">
            <input type="submit" value="Save">

            @error('discord_tag')
            <span style="color:red">{{$message}}</span>
            @enderror
        </form>

        <!-- Formulario para cambiar la biografia -->
        <form action="/profile/{{ $user->username }}/edit-bio" method="POST" class="form-edit">
            <!-- Titulo del formulario -->
            <h2 class="info-title">Biography:</h2>
            @method('PATCH')
            @csrf
            <textarea
                name="biography"
                id="auto-resize"
                placeholder="Tell us about yourself!"
            >@if($user->biography){{ $user->biography }}@else{{old('biography')}}@endif</textarea>
            <input type="submit" value="Save">

            @error('biography')
            <span style="color:red">{{$message}}</span>
            @enderror
        </form>

        <!-- Formulario para cambiar tus gustos en juegos -->
        <form action="/profile/{{ $user->username }}/edit-likes" method="POST" class="form-edit">
            <!-- Titulo del formulario -->
            <h2 class="info-title">Favorite RPGs:</h2>
            @method('PATCH')
            @csrf
            <textarea
                name="game_likes"
                id="auto-resize2"
                placeholder="D&D, Cyberpunk, etc..."
            >@if($user->game_likes){{ $user->game_likes }}@else{{old('game_likes')}}@endif</textarea>
            <input type="submit" value="Save">

            @error('game_likes')
            <span style="color:red">{{$message}}</span>
            @enderror
        </form>

        <!-- Formulario para cambiar el email -->
        <form method="post" action="/profile/{{ $user->username }}/edit-email" class="form-edit">

            <!-- Titulo del formulario -->
            <h2 class="info-title">Email:</h2>
            @method('PATCH')
            @csrf
            <section class="email-wrapper">
                <label for="email">New email</label>
                <input type="text" name="email" id="email" class="">
                @error('email')
                <span style="color:red">{{$message}}</span>
                @enderror
            </section>
            <input type="submit" value="Change email" class="">
        </form>

        <!-- Formulario para cambiar la contraseña -->
        <form method="post" action="/profile/{{ $user->username }}/edit-password" class="form-edit">

            <!-- Titulo del formulario -->
            <h2 class="info-title">Password:</h2>
            @method('PATCH')
            @csrf

            <!-- Inputs para la contraseña actual -->
            <section class="password-wrapper">
                <label for="oldPassword">Current password</label>
                <input type="password" name="oldPassword" id="oldPassword" class="">
                @error('oldPassword')
                <span style="color:red">{{$message}}</span>
                @enderror
            </section>

            <!-- Inputs para la contraseña nueva -->
            <section class="password-wrapper">
                <label for="newPassword">New password:</label>
                <input type="password" name="newPassword" id="newPassword" class="">
                @error('newPassword')
                <span style="color:red">{{$message}}</span>
                @enderror
            </section>
            <!-- Botón submit -->
            <input type="submit" value="Change password" class="">
        </form>
    </section>
    <script>
        // Función para ajustar la altura del textarea
        function adjustTextareaHeight() {
            const textarea = document.getElementById('auto-resize');
            const textarea2 = document.getElementById('auto-resize2');
            textarea.style.height = 'auto'; // Reinicia la altura para calcular correctamente
            textarea.style.height = (textarea.scrollHeight) + 'px'; // Ajusta la altura al scrollHeight
            textarea2.style.height = 'auto'; // Reinicia la altura para calcular correctamente
            textarea2.style.height = (textarea2.scrollHeight) + 'px'; // Ajusta la altura al scrollHeight
        }

        // Llama a la función para ajustar la altura en la carga de la página
        window.addEventListener('load', adjustTextareaHeight);

        // Agrega un eventListener para el evento input
        const textarea = document.getElementById('auto-resize');
        textarea.addEventListener('input', adjustTextareaHeight);
    </script>
</x-layout>
