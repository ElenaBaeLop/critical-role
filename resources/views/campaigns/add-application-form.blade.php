@auth
    @if(Auth::user()->id != $campaign->user_id)
        @if(Auth::check() && Auth::user()->discord_tag)
                <form method="POST" action="/campaigns/{{$campaign->slug}}/applications">
                    @csrf

                    <header class="flex items-center">
                        <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}"
                             alt=""
                             width="40"
                             height="40"
                             class="">

                        <h2 class="ml-4">Want to join this campaign?</h2>
                    </header>

                    <div class="mt-6">
                        <textarea
                            name="body"
                            class=""
                            rows="5"
                            placeholder="Leave a brief description about yourself and tell us why you would like to join this campaign!"
                            required></textarea>

                        @error('body')
                        <span class="">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="">
                        <input type="submit" value="Submit" class="">
                    </div>
                </form>
        @elseif(Auth::check() && !Auth::user()->discord_tag)
            <p>In order to apply to a campaign you need to <a href="/profile/{{ Auth::user()->username }}/edit">update your discord tag</a></p>
        @else
            <p class="font-semibold">
                <a href="/register" class="hover:underline">Register</a> or
                <a href="/login" class="hover:underline">log in</a> to submit an application.
            </p>
        @endif
    @endif
@endauth
