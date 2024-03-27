<x-layout>
    <x-header />
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
        <label for="">New players</label>
        <div>{{ $campaign->searching_for_players }}</div>
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
