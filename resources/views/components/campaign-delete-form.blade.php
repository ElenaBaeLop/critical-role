<div class="btn tertiary-btn">
    <form id="deleteFormCampaign" action="/campaigns/{{$campaign->slug}}" method="post">
    @csrf
    @method('delete')
    </form>
    <button id="deleteBtnCampaign" class="">Delete</button>
</div>
<x-confirm-delete />
