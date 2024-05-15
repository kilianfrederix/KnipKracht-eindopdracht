<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('styles/login-register.css') }}" rel="stylesheet">
    <title>Register</title>
</head>

<body>
    <section class="form-box poppins-regular">
        <div class="form-content">
            <div class="auth-nav">
                <a class="auth-nav-link" href="{{ route('home') }}">Home</a>
            </div>
            <h2>Registreren</h2>
            <form action="{{ route('register.post') }}" method="post" id="registerForm">
                @csrf
                <div class="form-inputs">
                    <div class="form-element">
                        <div>
                            <label class="form-label" for="name">Volledige naam</label>
                            <div id="nameError" class="form-error"></div> <!-- Error message container -->
                            @error('name')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <input class="form-input" type="text" name="name" id="name"
                            value="{{ old('name') }}">
                    </div>
                    <div class="form-element">
                        <div>
                            <label class="form-label" for="email">E-mailadres</label>
                            <div id="emailError" class="form-error"></div> <!-- Error message container -->
                            @error('email')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <input class="form-input" type="text" name="email" id="email"
                            value="{{ old('email') }}">
                    </div>
                    <div class="form-element">
                        <div>
                            <label class="form-label" for="username">Gebruikersnaam</label>
                            <div id="usernameError" class="form-error"></div> <!-- Error message container -->
                            @error('username')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <input class="form-input" type="text" name="username" id="username"
                            value="{{ old('username') }}">
                    </div>
                    <div class="form-element">
                        <div>
                            <label class="form-label" for="password">Wachtwoord</label>
                            <div id="passwordError" class="form-error"></div> <!-- Error message container -->
                            @error('password')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <input class="form-input" type="password" name="password" id="password">
                    </div>
                    <div class="form-element">
                        <div>
                            <label class="form-label" for="password_confirmation">Wachtwoord bevestiging</label>
                            <div id="passwordConfirmationError" class="form-error"></div>
                            <!-- Error message container -->
                            @error('password_confirmation')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <input class="form-input" type="password" name="password_confirmation"
                            id="password_confirmation">
                    </div>

                    <div class="button-box">
                        <input class="submit-button" type="submit" value="Registeer" id="submitButton">
                    </div>
                </div>
            </form>
            <p>
                Heb je al een account?<a class="nav-link" href="{{ route('login.get') }}"> Inloggen</a>
            </p>
        </div>
    </section>
    <script>
        document.getElementById("registerForm").addEventListener("submit", function(event) {
            // Prevent form submission
            event.preventDefault();

            // Reset previous error messages
            document.getElementById("nameError").innerText = "";
            document.getElementById("emailError").innerText = "";
            document.getElementById("usernameError").innerText = "";
            document.getElementById("passwordError").innerText = "";
            document.getElementById("passwordConfirmationError").innerText = "";

            // Get form inputs
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var password_confirmation = document.getElementById("password_confirmation").value;

            // Validate name
            if (name.trim() === "") {
                document.getElementById("nameError").innerText = "Please enter your full name.";
                return;
            }

            // Validate email
            if (email.trim() === "") {
                document.getElementById("emailError").innerText = "Please enter your email address.";
                return;
            }

            // Validate username
            if (username.trim() === "") {
                document.getElementById("usernameError").innerText = "Please enter your username.";
                return;
            }

            // Validate password
            if (password.trim() === "") {
                document.getElementById("passwordError").innerText = "Please enter your password.";
                return;
            }
            // else if (!isValidPassword(password)) {
            //     document.getElementById("passwordError").innerText =
            //         "Password must contain at least 8 characters, including at least one uppercase letter, one lowercase letter, and one number.";
            //     return;
            // }

            // Validate password confirmation
            if (password_confirmation.trim() === "") {
                document.getElementById("passwordConfirmationError").innerText = "Please confirm your password.";
                return;
            } else if (password_confirmation !== password) {
                document.getElementById("passwordConfirmationError").innerText =
                    "Password confirmation does not match the password.";
                return;
            }

            // If inputs are valid, submit the form
            document.getElementById("registerForm").submit();
        });

        // Function to validate password using regex
        function isValidPassword(password) {
            var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
            return regex.test(password);
        }
    </script>
</body>

</html>
