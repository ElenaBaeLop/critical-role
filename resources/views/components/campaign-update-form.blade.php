<div class="btn primary-btn profile-btn">
    <form action="/edit-campaign/{{$campaign->slug}}" method="GET">
        @csrf
        <input type="submit" value="Update" class="input-btn">
    </form>
</div>
