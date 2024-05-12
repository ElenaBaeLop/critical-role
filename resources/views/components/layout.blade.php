<!doctype html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Critical Role</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="/css/generic.css">
    <link rel="stylesheet" href="/css/success-message.css">
    <script
        src="https://kit.fontawesome.com/f0d12fad38.js"
        crossorigin="anonymous"
    ></script>
    <script src="/js/jquery-3.7.1.min.js"></script>
</head>

<body>


{{ $slot }}


<x-success />
<x-error />
<script src="/js/success-message.js"></script>
</body>
