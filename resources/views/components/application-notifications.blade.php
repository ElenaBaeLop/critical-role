
<div class="notification">
        @switch($notification->type)
            @case('App\Notifications\ApplicationAccepted')
                <p class="notification-text">Congratz!! Your application for <a href="/campaigns/{{$notification->data['campaign']['slug']}}">{{$notification->data['campaign']['name']}}</a> campaign has been accepted.</p>
                <p class="notification-text">Now you can reach them by their discord server <b>{{$notification->data['campaign']['discord_server_tag']}}</b> or send them your discord tag:</p>
                <form action="/campaigns/{{$notification->data['campaign']['slug']}}/applications/send-info" method="POST" class="notification-text">
                    @csrf
                    <button type="submit" class="send-input"><i class="fas fa-paper-plane"></i>Send</button>
                </form>
                <p class="notification-text">Don't forget to join the discord server in a few days or your spot may be replaced</p>
                <p class="notification-text">Please be careful with who you share your information.</p>
                @break

            @case('App\Notifications\ApplicationRejected')
                <p class="notification-text">Sorry, your application for <a href="/campaigns/{{$notification->data['campaign']['slug']}}">{{$notification->data['campaign']['name']}}</a> campaign has been rejected.</p>
                <p class="notification-text">Don't worry, you can still apply for <a href="/join-campaign">other campaigns</a>.</p>
                @break

            @case('App\Notifications\ApplicationSubmited')
                <p class="notification-text">Your application for <a href="/campaigns/{{$notification->data['campaign']['slug']}}">{{$notification->data['campaign']['name']}}</a> campaign has been submited.</p>
                <p class="notification-text">Now you have to wait for the DM to accept or reject your application.</p>
                @break

            @case('App\Notifications\ApplicationFYCSubmited')
                <p class="notification-text">You have received a new application for your campaign: <a href="/campaigns/{{$notification->data['campaign']['slug']}}">{{$notification->data['campaign']['name']}}</a>.</p>
                <p class="notification-text">Head to your campaign page to accept or reject the application. Those poor souls are awaiting your decision.</p>
                @break

            @case('App\Notifications\UpdateProfile')
                <p class="notification-text">Don't forget to <a href="/profile/{{ Auth::user()->username }}/edit">update your profile!</a></p>
                <p class="notification-text">To apply or create a campaign you must have an active discord tag</p>
                <p class="notification-text">It would be nice to get to know you a little! You can do so by adding a brief description in your biography</p>
                @break

            @case('App\Notifications\SendInformation')
                <p class="notification-text">The user <a href="/profile/{{$notification->data['application_user']['username']}}">{{$notification->data['application_user']['username']}}</a> has sent you their discord tag (<b>{{$notification->data['application_user']['discord_tag']}}</b>) for
                    your campaign <a href="/campaigns/{{$notification->data['campaign']['slug']}}">{{$notification->data['campaign']['name']}}</a></p>
                <p class="notification-text">Contact them as soon as possible!</p>
                <p class="notification-text">Please manage personal data with care.</p>
                @break

            @default

        @endswitch

        <p class="notification-text">{{ $notification->created_at->diffForHumans() }}</p>
</div>
