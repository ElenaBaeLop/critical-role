<x-layout>
    <x-header />
    @auth
        @if(Auth::user()->id == $campaign->user_id)
            <x-campaign-delete-form :campaign="$campaign"/>
            <x-campaign-update-form :campaign="$campaign"/>
        @endif
    @endauth
    <section>
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
        <div>{{ $campaign->body }}
    </section>
-------------------------------------------------------------------------------------------------------------
    <section class="col-span-8 col-start-5 mt-10 space-y-6">
        @include ('campaigns.add-application-form')

        @foreach ($campaign->applications as $application)
            <x-campaign-application :application="$application"/>
        @endforeach
    </section>
</x-layout>
