<!--Mensaje de error -->
@if(session()->has('error'))
    <div class="error" id="error">
        <p>{{session('error')}}</p>
    </div>
@endif
