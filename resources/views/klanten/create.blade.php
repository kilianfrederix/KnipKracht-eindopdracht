@extends('layouts.default')

@section('title', 'Nieuwe Klant Toevoegen')

@section('content')
    <div class="container">
        <div class="button">
            <h1 class="form-title">Nieuwe Klant Toevoegen</h1>

            <form action="{{ route('klanten.store') }}" method="POST" id="klantForm">
                @csrf
                <div class="form-group">
                    <label for="naam">Naam:</label>
                    <div id="naamError" class="form-error"></div> <!-- Error message container -->
                    <input type="text" id="naam" name="naam" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <div id="emailError" class="form-error"></div> <!-- Error message container -->
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nummer">Telefoonnummer:</label>
                    <div id="nummerError" class="form-error"></div> <!-- Error message container -->
                    <input type="text" id="nummer" name="nummer" class="form-control">
                </div>
                <div class="button">
                    <button type="submit" class="add-button button" id="submitButton">Toevoegen</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById("klantForm").addEventListener("submit", function(event) {
            // Prevent form submission
            event.preventDefault();

            // Reset previous error messages
            document.getElementById("naamError").innerText = "";
            document.getElementById("emailError").innerText = "";
            document.getElementById("nummerError").innerText = "";

            // Get form inputs
            var naam = document.getElementById("naam").value;
            var email = document.getElementById("email").value;
            var nummer = document.getElementById("nummer").value;

            // Validate naam
            if (naam.trim() === "") {
                document.getElementById("naamError").innerText = "Vul alstublieft uw naam in.";
                return;
            }

            // Validate email
            if (email.trim() === "") {
                document.getElementById("emailError").innerText = "Vul alstublieft uw e-mailadres in.";
                return;
            } else if (!isValidEmail(email)) {
                document.getElementById("emailError").innerText = "Voer alstublieft een geldig e-mailadres in.";
                return;
            }

            // Validate nummer
            if (nummer.trim() === "") {
                document.getElementById("nummerError").innerText = "Vul alstublieft uw telefoonnummer in.";
                return;
            }

            // If inputs are valid, submit the form
            document.getElementById("klantForm").submit();
        });

        // Function to validate email using regex
        function isValidEmail(email) {
            var regex = /\S+@\S+\.\S+/;
            return regex.test(email);
        }
    </script>
@endsection
