<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klantgegevens</title>
</head>
<body>
    <h1>Klantgegevens</h1>
    <p>Naam: {{ $klant->naam }}</p>
    <p>Email: {{ $klant->email }}</p>
    <p>Telefoon: {{ $klant->nummer }}</p>

    <h2>Afspraken</h2>
    <ul>
        @foreach ($afspraken as $afspraak)
            <li>Datum: {{ $afspraak->datum }}, Tijd: {{ $afspraak->tijd }}</li>
        @endforeach
    </ul>
</body>
</html>
