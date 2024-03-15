<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Presto 11' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body >
    <x-navbar></x-navbar>
    <div class="bg-info min-vh-100">
        {{ $slot }}
    </div>
</body>

</html>
