<x-layout>
    <x-header />
    @auth
        @if($user->username == Auth::user()->username)
            <a href="/profile/{{ Auth::user()->username }}/edit">Editar perfil</a>
        @endif
    @endauth
    PERRRRRFIL


    nombre
    {{ $user->username }}

    Activo desde
    {{ $user->created_at }}
    @auth
        @if($user->username == Auth::user()->username)
            @if( $user->discord_tag)
                Discord tag
                <p>{{ $user->discord_tag }}</p>
            @endif
        @endif

        @if($user->username == Auth::user()->username)
            Email
            <p>{{ $user->email }}</p>
        @endif

    @endauth
    @if($user->biography)
        Biografia
        <p>{{ $user->biography }}</p>
    @endif
    @if($user->game_likes)
        Enjoys playing
        <p>{{ $user->game_likes }}</p>
    @endif
    @if($user->campaigns->count())
        Campaigns currently active
        <div>
            @foreach($user->campaigns as $campaign)
                <div>
                    <a href="/campaigns/{{ $campaign->slug }}">{{ $campaign->name }}</a>
                    <p class="">
                        Created
                        <time>{{ $campaign->created_at->format('F j, Y, g:i a') }}</time>
                    </p>
                    @if(Auth::user()->id == $campaign->user_id)
                        <x-campaign-delete-form :campaign="$campaign"/>
                        <x-campaign-update-form :campaign="$campaign"/>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</x-layout>
