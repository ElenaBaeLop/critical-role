<x-layout>
    <x-header />
    <link rel="stylesheet" href="/css/campaigns.css">
    <section class="search">
        <div class="search-wrapper">
            <h2>Search campaigns</h2>
            <form action="/join-campaign" method="GET" id="search_campaign_form">
                <div class="chosen-choices search-div" id="chosen-choices">
                    <label for="search_campaign">Category</label>
                    <input type="text" placeholder="Search" id="search_campaign" class="text-input">
                </div>
                <div class="search-div" id="">
                    <label for="">Campaign name</label>
                    <input type="text" name="name" placeholder="Search" id="" class="text-input">
                </div>
                <div class="search-div">
                    <label for="language">Language</label>
                    <select name="language" id="" class="text-input">
                        <option value="">All</option>
                        <option value="en">English</option>
                        <option value="es">Spanish</option>
                        <option value="fr">French</option>
                        <option value="de">German</option>
                        <option value="it">Italian</option>
                        <option value="pt">Portuguese</option>
                        <option value="ru">Russian</option>
                        <option value="zh">Chinese</option>
                        <option value="ja">Japanese</option>
                        <option value="ko">Korean</option>
                    </select>
                </div>
                <div class="search-div">
                    <p>Frequency</p>
                    <label class="tiny-text">
                        <input type="checkbox" name="session_frequency[]" value="once">
                        Once
                    </label>
                    <label class="tiny-text">
                        <input type="checkbox" name="session_frequency[]" value="weekly">
                        Weekly
                    </label>
                    <label class="tiny-text">
                        <input type="checkbox" name="session_frequency[]" value="monthly">
                        Monthly
                    </label>
                    <label class="tiny-text">
                        <input type="checkbox" name="session_frequency[]" value="sun">
                        Sunday
                    </label>
                    <label class="tiny-text">
                        <input type="checkbox" name="session_frequency[]" value="mon">
                        Monday
                    </label>
                    <label class="tiny-text">
                        <input type="checkbox" name="session_frequency[]" value="tue">
                        Tueday
                    </label>
                    <label class="tiny-text">
                        <input type="checkbox" name="session_frequency[]" value="wed">
                        Wednesay
                    </label>
                    <label class="tiny-text">
                        <input type="checkbox" name="session_frequency[]" value="thu">
                        Thuesday
                    </label>
                    <label class="tiny-text">
                        <input type="checkbox" name="session_frequency[]" value="fri">
                        Friday
                    </label>
                    <label class="tiny-text">
                        <input type="checkbox" name="session_frequency[]" value="sat">
                        Saturday
                    </label>

                </div>
                <div class="search-div-row">
                    <label for="">Searching for new players:</label>
                    <input type="checkbox" name="searching_for_players" value="1">
                </div>
                <input type="submit" value="Search" class="btn primary-btn">
            </form>

            <div id="listado_categorias">
                <div id="categorias">

                </div>
            </div>
        </div>
    </section>
    <section class="search-result">
        <div class="search-result-wrapper">
            <div class="search-result-header">
                <h3 class="title">Campaigns</h3>
                <a href="/join-campaign" class="btn primary-btn">Show all</a>
            </div>
            @if($campaigns->count())
                @foreach($campaigns as $campaign)
                    <div class="campaign">
                        <div class="campaign-info">
                            <a class="title secondary-title" href="/campaigns/{{ $campaign->slug }}">{{ $campaign->name }}</a>
                            <p class="tiny-text">{{ $campaign->category->name }}</p>
                            <p>{{ $campaign->excerpt }}</p>
                            <a class="tiny-text" href="/campaigns/{{ $campaign->slug }}">Read more...</a>
                        </div>
                        <p class="campaign-extrainfo tiny-text">
                            Created
                            <time>{{ $campaign->created_at->format('F j, Y') }}</time>
                            by <a href="/profile/{{ $campaign->author->username }}">{{ $campaign->author->username }}</a>
                        </p>
                        {{ $campaign->language }}/?????/////
                        {{ $campaign->session_frequency }}/////////
                        {{ $campaign->category->name }}///!!!!!///
                        {{ $campaign->searching_for_players }}
                        <span>------------------</span>
                    </div>
                @endforeach

                {{$campaigns->links()}}
            @else
                <p>No campaigns found</p>
            @endif
        </div>
    </section>
    <x-footer />
</x-layout>

<script src="{{ asset('js/category-dropdown.js') }}"></script>
