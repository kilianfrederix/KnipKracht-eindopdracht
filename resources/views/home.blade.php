@extends('layouts.default')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="home-content">
            <div class="title-slogan">
                <h1 class="title">KnipKracht</h1>
                <p class="slogan">hier komt een slogan</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="algemene-info-grid">
            <div class="werknemers-img-box">
                <img class="werknemers-img" src="images/haarsalon.webp" alt="werknemers image">
            </div>
            <div class="algemene-info">
                <p>hier komt uitleg over de zaak</p>
                <p> nog meer uitleg over de zaak</p>
                <a class="home-btn" href="{{ route('about') }}">Leer de kappers kennen</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="home-aanbod">
            <div class="aanbod-title">
                <h2>Bekijk ons aanbod</h2>
                <p>Heb je vragen over een behandeling? Aarzel niet om
                    <a class="nav-link-aanbod" href="{{ route('contact') }}">Contact</a> op te nemen
                </p>
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
                    <img src="" alt="dienst">
                    <p>kleuren</p>
                </div>
                <div class="aanbod-box">
                    <img src="" alt="dienst">
                    <p>dienst naam</p>
                </div>
                <div class="aanbod-box">
                    <img src="" alt="dienst">
                    <p>dienst naam</p>
                </div>
                <div class="aanbod-box">
                    <img src="" alt="dienst">
                    <p>dienst naam</p>
                </div>
                <div class="aanbod-box">
                    <img src="" alt="dienst">
                    <p>dienst naam</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="home-afspraak-content">
            <h2>Maak een afspraak</h2>
            <p class="home-afspraak-text">Als een kapper die u kiest niet beschikbaar is voor de gekozen datum, dan kan u
                altijd bij de andere kappers
                kijken voor een vrije plaats</p>
            <a class="afspraak-maken-btn" href="{{ route('afspraak.get') }}">Maak een afspraak</a>
        </div>
    </div>

@endsection
