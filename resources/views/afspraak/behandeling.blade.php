@extends('layouts.default')

@section('title', 'Behandelingen')

@section('content')
    <div class="afspraak-container">
        <div>
            <div class="left-sidebar">
                <div>
                    <h2>Behandeling kiezen</h2>
                    <p>Kies waarvoor u een afspraak wilt plannen</p>
                </div>
                <ul>
                    <li><a href="{{ route('behandeling.get')}}">Behandelingen</a></li>
                    <li><a href="{{ route('kappers.get')}}">Kappers</a></li>
                    <li><a href="{{ route('dag_tijd.get')}}">Dag & Tijd</a></li>
                    <li><a href="{{ route('gegevens.get')}}">Gegevens</a></li>
                    <li><a href="{{ route('overzicht.get')}}">Overzicht</a></li>
                </ul>
                <div>
                    <h2>Vragen</h2>
                    <p>Stuur een mail naar</p>
                    <a href="mailto:kilianfrederix@gmail.com">kilianfrederix@gmail.com</a>
                </div>
            </div>
            <div class="main-content">
                <div>
                    <h2>Behandeling kiezen</h2>
                </div>
                <div>
                    <p>icon</p>
                    <p>dienst naam</p>
                    <p>start van €prijs</p>
                </div>
            </div>
            <div class="right-sidebar">
                <div>
                    <h2>OVERZICHT</h2>
                </div>
                <div>

                </div>

            </div>
        </div>
    </div>
@endsection
