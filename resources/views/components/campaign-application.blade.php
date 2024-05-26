<article class="application">
    <div class="text-application-wrapper">
        <header class="header-post">
            <a href="/profile/{{ $application->author->username }}" class="">{{ $application->author->username }}</a>

            <p class="tiny-text">
                Posted
                <time>{{ $application->created_at->format('F j, Y, g:i a') }}</time>
            </p>
        </header>

        <p class="application-body">
            {{ $application->body }}
        </p>
    </div>
    <div class="btns-wrapper">
        @if($application->user_id == auth()->id() || $application->campaign->user_id == auth()->id() )
            <form id="{{$application->id}}" method="POST" action="/campaigns/{{$application->campaign->slug}}/applications/{{$application->id}}/delete">
                @csrf
                @method('DELETE')
            </form>
            <button class="icon-btn-ko deleteBtn" data-target="{{$application->id}}"><i class="fa-solid fa-xmark"></i></button>
        @endif
        @if($application->campaign->user_id == auth()->id() )
            <form method="POST" action="/campaigns/{{$application->campaign->slug}}/applications/{{$application->id}}/accept">
                @csrf
                <button type="submit"><i class="fa-solid fa-check icon-btn-ok"></i></button>
            </form>
        @endif
    </div>
</article>

