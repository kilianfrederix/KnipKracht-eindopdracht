@extends('layouts.default')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="home-content">
            <div class="title-slogan">
                <h1 class="title">KnipKracht</h1>
                <p class="slogan">Haarstudio Krachtig Knippen</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="algemene-info-grid">
            <div class="werknemers-img-box">
                <img class="werknemers-img" src="images/haarsalon.webp" alt="werknemers image">
            </div>
            <div class="algemene-info">
                <p class="info-text">
                    Vier jaar geleden begon ik samen met Vicky, Ocean aan onze droom, onze eigen haarsalon.
                    We zijn gestart met een klein oud zaakje over te nemen.
                    Dit deden we met drie, maar uiteindelijk zijn we al gegroeid naar meerdere haarstylisten.
                </p>
                <p class="info-text">
                    Na vier en een half jaar hebben we ons eerste pand gekocht, wat we volledig naar onze smaak hebben gerenoveerd /ingericht.
                    Na twee jaar hieraan gewerkt te hebben, zitten we hier op onze prachtige locatie met het concept KnipKracht,
                    waar we altijd naar gestreefd hebben. er is nu recent ook een vierde styliste Susie,
                </p>
                <a class="home-btn" href="{{ route('about') }}">Leer de stylisten kennen</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="home-aanbod">
            <div class="aanbod-title">
                <h2 class="aanbod-title">Bekijk ons aanbod</h2>
            </div>
        </div>
    </div>
    {{-- backend voor de diensten te tonen --}}
    <div class="container">
        <div class="aanbod-box-flex">
            <div class="aanbod-box-grid">
                <div class="aanbod-box">
                    <img class="aanbod-image" src="images/knippen.webp" alt="dienst">
                    <p>knippen</p>
                </div>
                <div class="aanbod-box">
                    <img class="aanbod-image" src="images/Haar-verven-kapper.jpeg" alt="dienst">
                    <p>verven</p>
                </div>
                <div class="aanbod-box">
                    <img class="aanbod-image" src="images/permanent.jpg" alt="dienst">
                    <p>permanent</p>
                </div>
                <div class="aanbod-box">
                    <img class="aanbod-image" src="images/baard-scheren.jpg" alt="dienst">
                    <p> baard scheren</p>
                </div>
                <div class="aanbod-box">
                    <img class="aanbod-image" src="images/baard-trimmen.jpg" alt="dienst">
                    <p>baard trimmer</p>
                </div>
                <div class="aanbod-box">
                    <img class="aanbod-image" src="images/hoofd-massage.jpg" alt="dienst">
                    <p>hoofd massage</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="home-afspraak-content">
            <h2 class="home-afspraak-title">Maak een afspraak</h2>
            <p class="home-afspraak-text">Als een kapper die u kiest niet beschikbaar is voor de gekozen datum, dan kan u
                altijd bij de andere kappers
                kijken voor een vrije plaats</p>
            <a class="afspraak-maken-btn" href="{{ route('calendar.index') }}">Maak een afspraak</a>
        </div>
    </div>

@endsection
