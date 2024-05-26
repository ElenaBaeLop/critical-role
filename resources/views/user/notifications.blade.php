<x-layout>
    <link rel="stylesheet" href="/css/notification.css">
    <div class="notification-wrapper">
        <div class="div-info">
            <h1 class="title">Notifications</h1>
            <form action="/profile/{{ Auth::user()->username }}/notifications" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="tiny-btn">Clear all</button>
            </form>
        </div>
        <div>
            <h2 class="info-title">New notifications</h2>
            @if($unreadNotifications->count())
                <div>
                    @foreach($unreadNotifications as $notification)
                        <x-application-notifications :notification="$notification"/>
                    @endforeach
                </div>
            @else
                <p class="notification-text">No new notifications</p>
            @endif
        </div>
        <div>
            <h2 class="info-title">Notifications</h2>
            @if($notifications->count())
                <div>
                    @foreach($notifications as $notification)
                        <x-application-notifications :notification="$notification"/>
                    @endforeach
                </div>
            @else
                <p class="notification-text">No notifications</p>
            @endif
        </div>
    </div>
</x-layout>
