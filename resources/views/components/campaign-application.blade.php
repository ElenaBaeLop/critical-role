<article class="flex space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{ $application->user_id }}" alt="" width="60" height="60" class="rounded-xl">
    </div>

    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $application->author->username }}</h3>

            <p class="text-xs">
                Posted
                <time>{{ $application->created_at->format('F j, Y, g:i a') }}</time>
            </p>
        </header>

        <p>
            {{ $application->body }}
        </p>
    </div>
    {{ $application->campaign->user_id }}
    @if($application->user_id == auth()->id() || $application->campaign->user_id == auth()->id() )
        <form method="POST" action="/campaigns/{{$application->campaign->slug}}/applications/{{$application->id}}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
        </form>
    @endif
    @if($application->campaign->user_id == auth()->id() )
        <form method="POST" action="/campaigns/{{$application->campaign->slug}}/applications/{{$application->id}}/accept">
            @csrf
            <input type="submit" value="Accept" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
        </form>
    @endif
</article>
