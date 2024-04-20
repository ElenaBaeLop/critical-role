<form id="deleteForm" action="/campaigns/{{$campaign->slug}}" method="post">
    @csrf
    @method('delete')
</form>
<button id="deleteBtn" class="">Delete</button>
<x-confirm-delete />
