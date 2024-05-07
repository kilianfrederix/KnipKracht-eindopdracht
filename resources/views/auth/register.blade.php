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
                <a href="{{ route('home') }}">Home</a>
            </div>
            <h2>Registreren</h2>
            <form action="{{ route('register.post') }}" method="post">
                @csrf
                <div class="form-inputs">
                    <div class="form-element">
                        <div>
                            <label class="form-label" for="name">Volledige naam</label>
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
                            @error('password')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <input class="form-input" type="password" name="password" id="password">
                    </div>
                    <div class="form-element">
                        <div>
                            <label class="form-label" for="password_confirmation">Wachtwoord bevestiging</label>
                            @error('password_confirmation')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <input class="form-input" type="password" name="password_confirmation"
                            id="password_confirmation">
                    </div>

                    <div class="button-box">
                        <input class="submit-button" type="submit" value="Registeer">
                    </div>
                </div>
            </form>
            <p>
                Heb je al een account?<a class="nav-link" href="{{ route('login.get') }}"> Inloggen</a>
            </p>
        </div>
    </section>
</body>

</html>
