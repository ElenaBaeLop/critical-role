<!doctype html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Critical Role</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script
        src="https://kit.fontawesome.com/f0d12fad38.js"
        crossorigin="anonymous"
    ></script>
</head>

<body>


{{ $slot }}


<!--Mensaje de success si registo se ha hecho/ Eliminar este mensaje con javaScript despues de 3 sec-->
@if(session()->has('success'))
    <div class="success" id="success">
        <p>{{session('success')}}</p>
    </div>
@endif

</body>
