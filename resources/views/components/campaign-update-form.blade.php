<form action="/edit-campaign/{{$campaign->slug}}" method="GET">
    @csrf
    <input type="submit" value="Update">
</form>
