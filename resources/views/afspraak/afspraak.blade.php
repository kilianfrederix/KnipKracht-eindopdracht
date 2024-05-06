@extends('layouts.default')

@section('title', 'afspraken')

@section('content')
    <div class="container">
        <div class="afspraken-grid">
            <div class="left-sidebar">
                {{-- behandeling kiezen uitleg --}}
                <div>
                    <img src="" alt="behandeling image">
                    <h2>Behandeling kiezen</h2>
                    <p>Kies waarvoor u een afspraak wilt plannen</p>
                </div>
                {{-- kapper kiezen uitleg --}}
                <div>
                    <img src="" alt="kappers image">
                    <h2>Kies je kapper</h2>
                    <p>je moet een kapper kiezen</p>
                </div>
                {{-- Dag / tijd kiezen uitleg --}}
                <div>
                    <img src="" alt="agenda image">
                    <h2>kies Dag & Tijd</h2>
                    <p>Kies je dag uit, klik op de groene tijdsslot voor te reserveren</p>
                </div>
                {{-- klant gegevens ingeven uitleg --}}
                <div>
                    <img src="" alt="gegevens image">
                    <h2>klant Gegevens</h2>
                    <p>Geef je gegevens op zodat we je reservatie kunnen bevestigen</p>
                </div>
                {{-- vragen blok --}}
                <div>
                    <h2>Vragen</h2>
                    <p>Stuur een mail naar</p>
                    <a href="mailto:kilianfrederix@gmail.com">kilianfrederix@gmail.com</a>
                </div>
            </div>

            <div class="main-content">
                {{-- behandeling kiezen blok --}}
                <div class="behandeling">
                    <div>
                        <h2>Behandeling kiezen</h2>
                    </div>
                    <div>
                        <label for="behandeling">Behandeling:</label><br>
                        <select id="behandeling" name="behandeling">
                            <option value="behandeling1">Behandeling 1</option>
                            <option value="behandeling2">Behandeling 2</option>
                            <!-- Voeg andere behandelingen toe -->
                        </select><br><br>
                        <p>Start vanaf €prijs</p>
                    </div>
                </div>
                {{-- kapper kiezen blok --}}
                <div>
                    <div>
                        <h2>Kies je kapper</h2>
                    </div>
                    <div>
                        <img src="" alt="profile image kapper">
                        <label for="kapper">Kapper:</label><br>
                        <select id="kapper" name="kapper">
                            <option value="kapper1">Kapper 1</option>
                            <option value="kapper2">Kapper 2</option>
                            <!-- Voeg andere kappers toe -->
                        </select><br><br>
                    </div>
                </div>

                {{-- dag / tijd kiezen blok --}}
                <div>
                    <div>
                        <h2>Kies Dag & Tijd</h2>
                        <p>Agenda</p>
                    </div>
                    <div>
                        <p>Kies een sleuf voor gekozen datum</p>
                        <ul>
                            <li>12:00 - 13:00 (beschikbaar)</li>
                            <li>13:00 - 14:00 (beschikbaar)</li>
                            <!-- Voeg andere beschikbare tijdsslots toe -->
                        </ul>
                    </div>
                </div>

                {{-- klant gegvenens ingeven --}}
                <div>
                    <div>
                        <h2>Klant Gegevens</h2>
                        <p>uw contact gegevens</p>
                        <p>Ben jij dit niet <a href="#">Afmelden</a></p>
                    </div>
                    <div>
                        <form action="{{ route('save_customer_data') }}" method="post">
                            @csrf
                            <label for="naam">Naam:</label><br>
                            <input type="text" id="naam" name="naam" required><br><br>

                            <label for="email">E-mailadres:</label><br>
                            <input type="email" id="email" name="email" required><br><br>

                            <label for="telefoon">Telefoonnummer:</label><br>
                            <input type="tel" id="telefoon" name="telefoon" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="0123-56-78-90" required><br><br>

                            <input type="submit" value="Verzenden">
                        </form>
                    </div>
                </div>


            {{-- overzicht keuzes --}}
            <div class="right-sidebar">
                <div>
                    <h2>OVERZICHT</h2>
                </div>
                <div>
                    <p>Gekozen dienst naam</p>
                    <p>Gekozen datum / uur</p>
                    <p>klant naam</p>
                    <p>gekozen kapper naam</p>
                </div>
                <div>
                    <p>gekozen dienst naam / €prijs</p>
                    <p>Totaal Prijs / €prijs</p>
                </div>
            </div>
        </div>
    </div>
@endsection
