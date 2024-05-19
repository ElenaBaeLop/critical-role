@auth
    @if(Auth::user()->id != $campaign->user_id)
        @if(Auth::check() && Auth::user()->discord_tag)
                <form method="POST" action="/campaigns/{{$campaign->slug}}/applications">
                    @csrf

                    <header class="">
                        <h2 class="tertiary-title">Want to join this campaign?</h2>
                    </header>

                    <div class="">
                        <textarea
                            name="body"
                            class="textarea"
                            rows="5"
                            placeholder="Leave a brief description about yourself and tell us why you would like to join this campaign!"
                            required></textarea>

                        @error('body')
                        <span class="">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="">
                        <input type="submit" value="Submit" class="btn tertiary-btn">
                    </div>
                </form>
        @elseif(Auth::check() && !Auth::user()->discord_tag)
            <p class="tiny-text">In order to apply to a campaign you need to <a href="/profile/{{ Auth::user()->username }}/edit">update your discord tag</a></p>
        @endif
    @endif
@else
    <p class="tiny-text">
        <a href="/register" class="hover:underline">Register</a> or
        <a href="/login" class="hover:underline">log in</a> to submit an application.
    </p>
@endauth
