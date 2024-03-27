<form action="/campaigns/{{$campaign->slug}}" method="post">
    @csrf
    @method('delete')
    <input type="submit" value="Delete">
</form>
