<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Nuova richiesta:</h1>
    <ol>
        <li>Utente {{ $user->name }}</li>
        <li>Mail {{ $user->email }}</li>
        <li>Messaggio: {{ $info }}</li>
    </ol>
    <a href="{{route('makeRevisor', compact('user'))}}" class="">Rendi revisore </a>
</body>

</html>
