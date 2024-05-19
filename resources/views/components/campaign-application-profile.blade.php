<article class="flex space-x-4">
    <div>
        <header class="mb-4">
            <a href="/campaigns/{{ $application->campaign->slug }}" class="">{{ $application->campaign->name }}</a>

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
        <form id="deleteForm" method="POST" action="/campaigns/{{$application->campaign->slug}}/applications/{{$application->id}}/delete">
            @csrf
            @method('DELETE')
        </form>
        <button id="deleteBtn" class="icon-btn-ko"><i class="fa-solid fa-xmark"></i></button>
    @endif
</article>
<x-confirm-delete />

