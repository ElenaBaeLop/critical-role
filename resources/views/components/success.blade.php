<!--Mensaje de success si registo se ha hecho/ Eliminar este mensaje con javaScript despues de 3 sec-->
@if(session()->has('success'))
    <div class="success" id="success">
        <p>{{session('success')}}</p>
    </div>
@endif
