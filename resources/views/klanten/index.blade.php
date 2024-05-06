<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klanten</title>
</head>
<body>
    <h1>Klanten</h1>
    <ul>
        @foreach ($klanten as $klant)
            <li><a href="{{ route('klanten.show', $klant->id) }}">{{ $klant->naam }}</a></li>
        @endforeach
    </ul>
</body>
</html>
