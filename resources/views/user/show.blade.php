<x-layout>
    <x-header />
    @if($user->username == Auth::user()->username)
        <a href="/profile/{{ Auth::user()->username }}/edit">Editar perfil</a>
    @endif
    PERRRRRFIL


    nombre
    {{ $user->username }}

    Activo desde
    {{ $user->created_at }}
    @if($user->username == Auth::user()->username)
        Discord tag
        <p>{{ $user->discord_tag }}</p>
    @endif
    @if($user->biography)
        Biografia
        <p>{{ $user->biography }}</p>
    @endif
    @if($user->username == Auth::user()->username)
        Email
        <p>{{ $user->email }}</p>
    @endif
</x-layout>
