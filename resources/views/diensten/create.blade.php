<!-- resources/views/diensten/create.blade.php -->

@extends('layouts.default')

@section('title', 'Nieuwe Dienst Toevoegen')

@section('content')
    <div class="container">
        <div class="button">
            <h1 class="form-title">Nieuwe Dienst Toevoegen</h1>

            <form action="{{ route('diensten.store') }}" method="POST" id="dienstenForm">
                @csrf
                <div class="form-group">
                    <label for="name">Naam:</label>
                    <div id="nameError" class="form-error"></div> <!-- Error message container -->
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="geslacht">Geslacht:</label>
                    <div id="geslachtError" class="form-error"></div> <!-- Error message container -->
                    <input type="text" id="geslacht" name="geslacht" class="form-control">
                </div>
                <div class="form-group">
                    <label for="duration">Duur (minuten):</label>
                    <div id="durationError" class="form-error"></div> <!-- Error message container -->
                    <input type="number" id="duration" name="duration" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">Prijs:</label>
                    <div id="priceError" class="form-error"></div> <!-- Error message container -->
                    <input type="number" id="price" name="price" class="form-control">
                </div>
                <div class="button">
                    <button type="submit" class="add-button" id="submitButton">Toevoegen</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById("dienstenForm").addEventListener("submit", function(event) {
            // Prevent form submission
            event.preventDefault();

            // Reset previous error messages
            document.getElementById("nameError").innerText = "";
            document.getElementById("geslachtError").innerText = "";
            document.getElementById("durationError").innerText = "";
            document.getElementById("priceError").innerText = "";

            // Get form inputs
            var name = document.getElementById("name").value;
            var geslacht = document.getElementById("geslacht").value;
            var duration = document.getElementById("duration").value;
            var price = document.getElementById("price").value;

            // Validate name
            if (name.trim() === "") {
                document.getElementById("nameError").innerText = "Vul alstublieft de naam van de dienst in.";
                return;
            }

            // Validate geslacht
            if (geslacht.trim() === "") {
                document.getElementById("geslachtError").innerText =
                    "Vul alstublieft het geslacht van de dienst in.";
                return;
            }

            // Validate duration
            if (duration.trim() === "") {
                document.getElementById("durationError").innerText = "Vul alstublieft de duur van de dienst in.";
                return;
            } else if (isNaN(duration) || duration <= 0) {
                document.getElementById("durationError").innerText =
                    "Voer alstublieft een geldige duur in (positief getal).";
                return;
            }

            // Validate price
            if (price.trim() === "") {
                document.getElementById("priceError").innerText = "Vul alstublieft de prijs van de dienst in.";
                return;
            } else if (isNaN(price) || price <= 0) {
                document.getElementById("priceError").innerText =
                    "Voer alstublieft een geldige prijs in (positief getal).";
                return;
            }

            // If inputs are valid, submit the form
            document.getElementById("dienstenForm").submit();
        });
    </script>
@endsection
