<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>

<body>
    <b>Trade : </b> <span id=trade-data> </span>
    {{-- <script src="{{ asset('js/app.js')}}"></script> --}}
    @vite('resources/js/app.js')
    <script>
        window.onload = function() {
            Echo.channel('trades').listen('NewTrade', (e) => {
                console.log(e.trade);
            });
        }
    </script>

</body>

</html>
