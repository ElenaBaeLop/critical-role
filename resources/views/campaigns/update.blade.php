<x-layout>
    <link rel="stylesheet" href="/css/create-campaign.css">
    <div class="create-campaign-wrapper">
        <form action="/edit-campaign/{{$campaign->slug}}" method="post" class="create-campaign">
            @csrf
            @method('patch')
            <div class="">
                <label for="name" class="">Campaign name</label>
                <input type="text" name="name" id="name" value="{{old('name', $campaign->name)}}" required class="">
                @error('name')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="">
                <label for="total_players" class="">Total players</label>
                <input type="number" name="total_players" id="total_players" value="{{old('total_players', $campaign->total_players)}}" required class="">
                @error('total_players')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="frequency-wrapper">
                <label for="session_frequency" class="">How often will the sessions be held?</label>
                <div class="frequency-input">
                    <div>
                        <label for="session_frequency_once">Once</label>
                        <input type="radio" name="session_frequency" id="session_frequency_once" value="once" {{ old('session_frequency', $campaign->session_frequency) == 'once' ? 'checked' : '' }}>
                    </div>
                    <div>
                        <label for="session_frequency_monthly">Monthly</label>
                        <input type="radio" name="session_frequency" id="session_frequency_monthly" value="monthly" {{ old('session_frequency', $campaign->session_frequency) == 'monthly' ? 'checked' : '' }}>
                    </div>
                    <div>
                        <label for="session_frequency_weekly">Weekly</label>
                        <input type="radio" name="session_frequency" id="session_frequency_weekly"
                        @if(old('session_frequency', $campaign->session_frequency) == 'weekly' || old('session_frequency', $campaign->session_frequency) == 'sun' || old('session_frequency', $campaign->session_frequency) == 'mon' || old('session_frequency', $campaign->session_frequency) == 'tue' || old('session_frequency', $campaign->session_frequency) == 'wed' || old('session_frequency', $campaign->session_frequency) == 'thu' || old('session_frequency', $campaign->session_frequency) == 'fri' || old('session_frequency', $campaign->session_frequency) == 'sat')
                             {{ 'checked' }}
                        @endif>
                    </div>

                    <select name="session_frequency" id="session_frequency_days">
                        <option value="weekly" {{ old('session_frequency', $campaign->session_frequency) == 'weekly' ? 'selected' : '' }}>Any day</option>
                        <option value="sun" {{ old('session_frequency', $campaign->session_frequency) == 'sun' ? 'selected' : '' }}>Sunday</option>
                        <option value="mon" {{ old('session_frequency', $campaign->session_frequency) == 'mon' ? 'selected' : '' }}>Monday</option>
                        <option value="tue" {{ old('session_frequency', $campaign->session_frequency) == 'tue' ? 'selected' : '' }}>Tuesday</option>
                        <option value="wed" {{ old('session_frequency', $campaign->session_frequency) == 'wed' ? 'selected' : '' }}>Wednesday</option>
                        <option value="thu" {{ old('session_frequency', $campaign->session_frequency) == 'thu' ? 'selected' : '' }}>Thursday</option>
                        <option value="fri" {{ old('session_frequency', $campaign->session_frequency) == 'fri' ? 'selected' : '' }}>Friday</option>
                        <option value="sat" {{ old('session_frequency', $campaign->session_frequency) == 'sat' ? 'selected' : '' }}>Saturday</option>
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
                <input type="checkbox" name="searching_for_players" id="searching_for_players" value="{{$campaign->searching_for_players}}" class="" {{ old('searching_for_players', $campaign->searching_for_players) == 1 ? 'checked' : '' }}>
                @error('searching_for_players')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="">
                <label for="discord_server_tag" class="">Discord server tag</label>
                <input type="text" name="discord_server_tag" id="discord_server_tag" value="{{old('discord_server_tag', $campaign->discord_server_tag)}}" required class="">
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
                    required>{{old('body', $campaign->body)}}</textarea>

                @error('body')
                <span class="">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="category_id">RGPs</label>
                <select name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $campaign->category_id) == $category->id ? 'selected' : '' }}
                        >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="submit" value="Update" class="btn tertiary-btn">
            </div>
        </form>
    </div>
</x-layout>

<script src="{{ asset('js/session-frequency-weekly-dropdown.js') }}"></script>
