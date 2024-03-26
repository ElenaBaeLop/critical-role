<style>
    /* Estilos para posicionar la lista */
    #listado_categorias {
        display: none;
        position: absolute;
        top: 30px; /* Ajusta este valor según tu diseño */
        left: 0;
        z-index: 999;
        background-color: #fff;
        border: 1px solid #ccc;
        width: 200px; /* Ajusta el ancho según tu diseño */
        padding: 10px;
        display: none;
    }
    .prueba{
        border: solid 1px black;
    }
</style>

<h1>BUSQUEDA</h1>
<form action="/joinCampaign" method="GET" id="search_campaign_form">
    <div class="chosen-choices" id="chosen-choices">
        <input type="text" placeholder="Search" id="search_campaign">
    </div>
    <select name="language" id="">
        <option value="">It doesn't matter</option>
        <option value="en">English</option>
        <option value="es">Spanish</option>
        <option value="fr">French</option>
        <option value="de">German</option>
        <option value="it">Italian</option>
        <option value="pt">Portuguese</option>
        <option value="ru">Russian</option>
        <option value="zh">Chinese</option>
        <option value="ja">Japanese</option>
        <option value="ko">Korean</option>
    </select>
    <div>
        <label>
            <input type="checkbox" name="session_frequency[]" value="once">
            Once
        </label>
        <label>
            <input type="checkbox" name="session_frequency[]" value="weekly">
            Weekly
        </label>
        <label>
            <input type="checkbox" name="session_frequency[]" value="monthly">
            Monthly
        </label>
        <label>
            <input type="checkbox" name="session_frequency[]" value="sun">
            Sunday
        </label>
        <label>
            <input type="checkbox" name="session_frequency[]" value="mon">
            Monday
        </label>
        <label>
            <input type="checkbox" name="session_frequency[]" value="tue">
            Tueday
        </label>
        <label>
            <input type="checkbox" name="session_frequency[]" value="wed">
            Wednesay
        </label>
        <label>
            <input type="checkbox" name="session_frequency[]" value="thu">
            Thuesday
        </label>
        <label>
            <input type="checkbox" name="session_frequency[]" value="fri">
            Friday
        </label>
        <label>
            <input type="checkbox" name="session_frequency[]" value="sat">
            Saturday
        </label>

    </div>
    <input type="submit" value="Buscar">
</form>

<div id="listado_categorias">
    <div id="categorias">

    </div>
</div>

<h1>LISTADO</h1>
<a href="/joinCampaign">Mostrar todo</a>
@foreach($campaigns as $campaign)
    <div class="prueba">
        <div>{{ $campaign->author->username }}</div>
        <div>
            <a href="/campaigns/{{ $campaign->slug }}">{{ $campaign->name }}</a>
            <p>{{ $campaign->excerpt }}</p>
        </div>
        <div class="hidden lg:block">
            <a href="/campaigns/{{ $campaign->slug }}">Read More</a>
        </div>
        {{ $campaign->language }}////////
        {{ $campaign->session_frequency }}/////////
        {{ $campaign->category->name }}
        <span>------------------</span>
    </div>
@endforeach

<script src="js/jquery-3.7.1.min.js"></script>
<script src="{{ asset('js/category-dropdown.js') }}"></script>
