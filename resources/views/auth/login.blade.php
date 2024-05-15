<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('styles/login-register.css') }}" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <section class="form-box poppins-regular">
        <div class="form-content">
            <div class="auth-nav">
                <a class="auth-nav-link" href="{{ route('home') }}">Home</a>
            </div>
            <h2>Login</h2>
            <form action="{{ route('login.post') }}" method="post" id="loginForm">
                @csrf
                <div class="form-inputs">
                    <div class="form-element">
                        <div>
                            <label class="form-label" for="username">Username</label>
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
                            <label class="form-label" for="password">Password</label>
                            <div id="passwordError" class="form-error"></div> <!-- Error message container -->
                            @error('password')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <input class="form-input" type="password" name="password" id="password">
                    </div>

                    <div class="button-box">
                        <input class="submit-button" type="submit" value="Login" id="submitButton">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            // Prevent form submission
            event.preventDefault();

            // Reset previous error messages
            document.getElementById("usernameError").innerText = "";
            document.getElementById("passwordError").innerText = "";

            // Get form inputs
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

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

            // If inputs are valid, submit the form
            document.getElementById("loginForm").submit();
        });
    </script>
</body>

</html>
