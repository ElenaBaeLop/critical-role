@if(Auth::check() && Auth::user()->discord_tag)
        <form method="POST" action="/campaigns/{{$campaign->slug}}/applications">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}"
                     alt=""
                     width="40"
                     height="40"
                     class="rounded-full">

                <h2 class="ml-4">Want to participate in this campaign?</h2>
            </header>

            <div class="mt-6">
                <textarea
                    name="body"
                    class="w-full text-sm focus:outline-none focus:ring"
                    rows="5"
                    placeholder="Quick, describe yourself a bit and tell us why you want to participate in this campaign!"
                    required></textarea>

                @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <input type="submit" value="Submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
            </div>
        </form>
@elseif(Auth::check() && !Auth::user()->discord_tag)
    <p>In order to apply to this campaign you need to <a href="/profile/{{ Auth::user()->username }}/edit">update your discord tag</a></p>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or
        <a href="/login" class="hover:underline">log in</a> to leave an application.
    </p>
@endif
