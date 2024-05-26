<x-layout>
    <link rel="stylesheet" href="/css/profile-user.css">
    <section class="profile-user-wrapper">
        <div class="personal-info-wrapper">
            @auth
                @if($user->username == Auth::user()->username)
                    <div class="options-wrapper">
                        <a href="/profile/{{ Auth::user()->username }}/edit">Edit profile</a>
                        <a href="/profile/{{ Auth::user()->username }}/notifications">Notifications</a>
                    </div>
                @endif
            @endauth
            <div class="details-wrapper">
                <h1 class="title">{{ ucfirst($user->username) }}</h1>
                <p class="tiny-text">
                Active since
                {{ $user->created_at }}</p>
            </div>
            <div class="details-wrapper">
                @auth
                    <div>
                        @if($user->username == Auth::user()->username)
                            @if( $user->discord_tag)
                                <div>
                                    <h2 class="info-title">Discord tag</h2>
                                    <p class="info-text">{{ $user->discord_tag }}</p>
                                </div>
                            @endif
                            <div>
                                <h2 class="info-title">Email</h2>
                                <p class="info-text">{{ $user->email }}</p>
                            </div>
                        @endif
                    </div>
                @endauth
                @if($user->biography)
                    <div>
                        <h2 class="info-title">Biografia</h2>
                        <p class="info-text">{{ $user->biography }}</p>
                    </div>
                @endif
                @if($user->game_likes)
                    <div>
                        <h2 class="info-title">Enjoys playing</h2>
                        <p class="info-text">{{ $user->game_likes }}</p>
                    </div>
                @endif
            </div>
        </div>
        <div class="activities-wrapper">
            @if($user->campaigns->count())
                <div class="campaings-wrapper">
                    <h2 class="section-title">Campaigns currently active</h2>
                    @foreach($user->campaigns as $campaign)
                        <div class="campaign">
                            <div class="campaign-info">
                                <a href="/campaigns/{{ $campaign->slug }}" class="campaign-title">{{ $campaign->name }}</a>
                                <p class="tiny-text">
                                    Created
                                    <time>{{ $campaign->created_at->format('F j, Y, g:i a') }}</time>
                                </p>
                            </div>
                            @auth
                                @if(Auth::user()->id == $campaign->user_id)
                                    <div class="btns-wrapper">
                                        <x-campaign-delete-form :campaign="$campaign"/>
                                        <x-campaign-update-form :campaign="$campaign"/>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    @endforeach
                </div>
            @endif

            @if($user->applications->count())
                <div class="applications-profile-wrapper">
                    <h2 class="section-title">Applications currently active</h2>
                    <div>
                        @foreach($user->applications as $application)
                            <x-campaign-application-profile :application="$application"/>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-layout>
