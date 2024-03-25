<h1>BUSQUEDA</h1>
<form action="/joinCampaign" method="GET">
    <input type="text" name="search" placeholder="Buscar">

    <select name="category[]" multiple>
        <option value="">Todas las categorias</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <input type="submit" value="Buscar">
</form>







<h1>LISTADO</h1>
@foreach($campaigns as $campaign)
    <div>{{ $campaign->author->username }}</div>
    <div>
        <a href="/campaigns/{{ $campaign->slug }}">{{ $campaign->name }}</a>
        <p>{{ $campaign->excerpt }}</p>
    </div>
    <div class="hidden lg:block">
        <a href="/campaigns/{{ $campaign->slug }}">Read More</a>
    </div>
    <span>------------------</span>
@endforeach
