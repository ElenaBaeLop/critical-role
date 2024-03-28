<x-layout>
    <x-header />
    <div>
        <h1>Notifications</h1>
        <form action="/profile/{{ Auth::user()->username }}/notifications" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Clear all</button>
        </form>
                <div>
                    <h2>New notifications</h2>
                    @if($unreadNotifications->count())
                        <div>
                            @foreach($unreadNotifications as $notification)
                                <x-application-notifications :notification="$notification"/>
                            @endforeach
                        </div>
                    @else
                        <p>No new notifications</p>
                    @endif
                </div>
                <div>
                    <h2>Notifications</h2>
                    @if($notifications->count())
                        <div>
                            @foreach($notifications as $notification)
                                <x-application-notifications :notification="$notification"/>
                            @endforeach
                        </div>
                    @else
                        <p>No notifications</p>
                    @endif
                </div>
    </div>
</x-layout>
