<style>
    .notification {
        border: solid 1px black;
    }
</style>
<div class="notification">
        @switch($notification->type)
            @case('App\Notifications\ApplicationAccepted')
                <p>Congratz!! Your application for <a href="/campaigns/{{$notification->data['campaign']['slug']}}">{{$notification->data['campaign']['name']}}</a> campaign has been accepted.</p>
                <p>Now you can reach them by their discord server <b>{{$notification->data['campaign']['discord_server_tag']}}</b> or
                <form action="/campaigns/{{$notification->data['campaign']['slug']}}/applications/send-info" method="POST">
                    @csrf
                    <input type="submit" value="send">
                </form> them your discord tag</p>
                <p>Don't forget to join the discord server in a few days or your spot may be replaced</p>
                <p>Please be careful with who you share your information.</p>
                @break

            @case('App\Notifications\ApplicationRejected')
                <p>Sorry, your application for <a href="/campaigns/{{$notification->data['campaign']['slug']}}">{{$notification->data['campaign']['name']}}</a> campaign has been rejected.</p>
                <p>Don't worry, you can still apply for <a href="/join-campaign">other campaigns</a>.</p>
                @break

            @case('App\Notifications\ApplicationSubmited')
                <p>Your application for <a href="/campaigns/{{$notification->data['campaign']['slug']}}">{{$notification->data['campaign']['name']}}</a> campaign has been submited.</p>
                <p>Now you have to wait for the DM to accept or reject your application.</p>
                @break

            @case('App\Notifications\ApplicationFYCSubmited')
                <p>You have received a new application for your campaign: <a href="/campaigns/{{$notification->data['campaign']['slug']}}">{{$notification->data['campaign']['name']}}</a>.</p>
                <p>Head to your campaign page to accept or reject the application. Those poor souls are awaiting your decision.</p>
                @break

            @case('App\Notifications\UpdateProfile')
                <p>Don't forget to <a href="/profile/{{ Auth::user()->username }}/edit">update your profile!</a></p>
                <p>To apply or create a campaign you must have an active discord tag</p>
                <p>It would be nice to get to know you a little! You can do so by adding a brief description in your biography</p>
                @break

            @case('App\Notifications\SendInformation')
                <p>The user <a href="/profile/{{$notification->data['application_user']['username']}}">{{$notification->data['application_user']['username']}}</a> has sent you their discord tag (<b>{{$notification->data['application_user']['discord_tag']}}</b>) for
                    your campaign <a href="/campaigns/{{$notification->data['campaign']['slug']}}">{{$notification->data['campaign']['name']}}</a></p>
                <p>Contact them as soon as possible!</p>
                <p>Please manage personal data with care.</p>
                @break

            @default

        @endswitch

        <p>{{ $notification->created_at->diffForHumans() }}</p>
</div>
