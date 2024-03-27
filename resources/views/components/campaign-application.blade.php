<article class="flex space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{ $application->user_id }}" alt="" width="60" height="60" class="rounded-xl">
    </div>

    <div>
        <header class="mb-4">
            <a href="/profile/{{ $application->author->username }}" class="">{{ $application->author->username }}</a>

            <p class="text-xs">
                Posted
                <time>{{ $application->created_at->format('F j, Y, g:i a') }}</time>
            </p>
        </header>

        <p>
            {{ $application->body }}
        </p>
    </div>
    @if($application->user_id == auth()->id() || $application->campaign->user_id == auth()->id() )
        <form method="POST" action="/campaigns/{{$application->campaign->slug}}/applications/{{$application->id}}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" class="">
        </form>
    @endif
    @if($application->campaign->user_id == auth()->id() )
        <form method="POST" action="/campaigns/{{$application->campaign->slug}}/applications/{{$application->id}}/accept">
            @csrf
            <input type="submit" value="Accept" class="">
        </form>
    @endif
</article>
