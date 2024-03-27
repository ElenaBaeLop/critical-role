<x-layout>
    <x-header />
    PERRRRRFIL EDITABLE


    nombre
    {{ $user->username }}

    Activo desde
    {{ $user->created_at }}
    <!-- Formulario para cambiar el discord tag -->
    <form action="/profile/{{ $user->username }}/edit-discord" method="POST">
        <!-- Titulo del formulario -->
        <h2 class="">Change Discord tag:</h2>
        @method('PATCH')
        @csrf
        <input type="text" name="discord_tag" id="discord_tag" value=" @if($user->discord_tag) {{$user->discord_tag}} @else {{old('discord_tag')}} @endif ">
        <input type="submit" value="Save">

        @error('discord_tag')
        <span style="color:red">{{$message}}</span>
        @enderror
    </form>

    <!-- Formulario para cambiar la biografia -->
    <form action="/profile/{{ $user->username }}/edit-bio" method="POST">
        <!-- Titulo del formulario -->
        <h2 class="">Change Biography:</h2>
        @method('PATCH')
        @csrf
        <textarea name="biography" id="">@if($user->biography) {{ $user->biography }} @else {{old('biography')}} @endif </textarea>
        <input type="submit" value="Save">

        @error('biography')
        <span style="color:red">{{$message}}</span>
        @enderror
    </form>

    <!-- Formulario para cambiar la contraseña -->
    <form method="post" action="/profile/{{ $user->username }}/edit-password" class="">

        <!-- Titulo del formulario -->
        <h2 class="">Change password:</h2>
        @method('PATCH')
        @csrf

        <!-- Inputs para la contraseña actual -->
        <section class="">
            <label for="oldPassword">Current password</label>
            <input type="password" name="oldPassword" id="oldPassword" class="">
            @error('oldPassword')
            <span style="color:red">{{$message}}</span>
            @enderror
        </section>

        <!-- Inputs para la contraseña nueva -->
        <section class="">
            <label for="newPassword">New password:</label>
            <input type="password" name="newPassword" id="newPassword" class="">
            @error('newPassword')
            <span style="color:red">{{$message}}</span>
            @enderror
        </section>
        <!-- Botón submit -->
        <input type="submit" value="Change password" class="">
    </form>

    <!-- Formulario para cambiar el email -->
    <form method="post" action="/profile/{{ $user->username }}/edit-email" class="">

        <!-- Titulo del formulario -->
        <h2 class="">Change email:</h2>
        @method('PATCH')
        @csrf
        <section class="">
            <label for="email">New email</label>
            <input type="text" name="email" id="email" class="">
            @error('email')
            <span style="color:red">{{$message}}</span>
            @enderror
        </section>
        <input type="submit" value="Change email" class="">
    </form>
</x-layout>
