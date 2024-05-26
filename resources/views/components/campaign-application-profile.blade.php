<article class="application-profile">
    <div class="application-info">
        <header class="info-title">
            <a href="/campaigns/{{ $application->campaign->slug }}" class="campaign-title">{{ $application->campaign->name }}</a>

            <p class="tiny-text">
                Posted
                <time>{{ $application->created_at->format('F j, Y, g:i a') }}</time>
            </p>
        </header>

        <p>
            {{ $application->body }}
        </p>
    </div>
    @if($application->user_id == auth()->id() || $application->campaign->user_id == auth()->id() )
        <div class="application-btns">
            <form id="{{$application->id}}" method="POST" action="/campaigns/{{$application->campaign->slug}}/applications/{{$application->id}}/delete">
                @csrf
                @method('DELETE')
            </form>
            <button class="icon-btn-ko deleteBtn" data-target="{{$application->id}}"><i class="fa-solid fa-xmark"></i></button>
        </div>
    @endif
</article>

