<div class="btn tertiary-btn profile-btn deleteBtn" data-target="{{$campaign->slug}}">
    <form id="{{$campaign->slug}}" action="/campaigns/{{$campaign->slug}}" method="post">
    @csrf
    @method('delete')
    </form>
    <button>Delete</button>
</div>

