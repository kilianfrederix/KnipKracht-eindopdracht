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
                <a href="{{ route('home') }}">Home</a>
            </div>
            <h2>Login</h2>
            <form action="{{ route('login.post') }}" method="post">
                @csrf
                <div class="form-inputs">
                    <div class="form-element">
                        <div>
                            <label class="form-label" for="username">Username</label>
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
                            @error('password')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <input class="form-input" type="password" name="password" id="password">
                    </div>

                    <div class="button-box">
                        <input class="submit-button" type="submit" value="Login">
                    </div>
                </div>
            </form>
            <p>
                Heb je nog geen account?<a class="nav-link" href="{{ route('register.get') }}"> Registreren</a>
            </p>
        </div>
    </section>
</body>

</html>
