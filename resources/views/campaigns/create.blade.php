<x-layout>
    <x-header />
    <link rel="stylesheet" href="/css/create-campaign.css">
    <div class="create-campaign-wrapper">
        <form action="/create-campaign" method="post" class="create-campaign">
        @csrf
            <div class="">
                <label for="name" class="">Campaign name</label>
                <input type="text" name="name" id="name" value="{{old('name') }}" required class="">
                @error('name')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="">
                <label for="total_players" class="">Total players</label>
                <input type="number" name="total_players" id="total_players" value="{{old('total_players') }}" required class="">
                @error('total_players')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="frequency-wrapper">
                <label for="session_frequency" class="">How often will the sessions be held?</label>
                <div class="frequency-input">
                    <label for="session_frequency_once">Once</label>
                    <input type="radio" name="session_frequency" id="session_frequency_once" value="once">
                    <label for="session_frequency_monthly">Monthly</label>
                    <input type="radio" name="session_frequency" id="session_frequency_monthly" value="monthly">
                    <label for="session_frequency_weekly">Weekly</label>
                    <input type="radio" name="session_frequency" id="session_frequency_weekly">



                    <select name="session_frequency" id="session_frequency_days">
                        <option value="weekly">Any day</option>
                        <option value="sun">Sunday</option>
                        <option value="mon">Monday</option>
                        <option value="tue">Tuesday</option>
                        <option value="wed">Wednesday</option>
                        <option value="thu">Thursday</option>
                        <option value="fri">Friday</option>
                        <option value="sat">Saturday</option>
                    </select>
                    @error('session_frequency')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="">
                <label for="language">Language</label>
                <select name="language" id="language">
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
                @error('language')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="">
                <label for="searching_for_players" class="">Searching for new players</label>
                <input type="checkbox" name="searching_for_players" id="searching_for_players" value="1" class="">
                @error('searching_for_players')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="">
                <label for="discord_server_tag" class="">Discord server tag</label>
                <input type="text" name="discord_server_tag" id="discord_server_tag" value="{{old('discord_server_tag') }}" required class="">
                @error('discord_server_tag')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="">
                <label for="body" class="">Description</label>
                        <textarea
                            name="body"
                            class=""
                            rows="5"
                            placeholder="Help the players know more about your campaign!"
                            required>{{old('body')}}</textarea>

                @error('body')
                <span class="">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="category_id">RGPs</label>
                <select name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="submit" value="Create" class="btn primary-btn">
            </div>
        </form>
    </div>
    <x-footer />
</x-layout>

<script src="{{ asset('js/session-frequency-weekly-dropdown.js') }}"></script>
