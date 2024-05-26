<x-layout>
    <link rel="stylesheet" href="/css/profile-campaign.css">
    <div class="campaign-profile-wrapper">
        @auth
            @if(Auth::user()->id == $campaign->user_id)
                <div class="campaign-profile-btns">
                    <x-campaign-delete-form :campaign="$campaign"/>
                    <x-campaign-update-form :campaign="$campaign"/>
                </div>
            @endif
        @endauth
        <section class="campaign">
            <h1>{{ $campaign->name }}</h1>
            <label for="">Playing</label>
            <div>{{ $campaign->category->name }}</div>
            <label for="">Total players</label>
            <div>{{ $campaign->total_players }}</div>
            <label for="">Frequency</label>
            <div>{{ $campaign->session_frequency }}</div>
            <label for="">Language</label>
            <div>{{ $campaign->language }}</div>
            <label for="">Searching for new players</label>
            @if($campaign->searching_for_players == 1)
                <div>Yes</div>
            @else
                <div>No</div>
            @endif
            <label for="">Info</label>
            <div>{{ $campaign->body }}</div>
        </section>
        <section class="applications-wrapper">
            @include ('campaigns.add-application-form')
            <div class="applications">
                @foreach ($campaign->applications as $application)
                    <x-campaign-application :application="$application"/>
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
