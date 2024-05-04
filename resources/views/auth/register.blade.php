@extends('layouts.default')

@section('title', 'Registreren')

@section('content')
    <section>
        <h2>Registreren</h2>

        <p>
            <a href="{{ route('login.get') }}">Of login met je account</a>
        </p>

        <form action="{{ route('register.post') }}" method="post">
            @csrf
            <div class="form-content">
                <div class="form-element">
                    <div>
                        <label for="name">Volledige naam</label>
                        @error('name')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="text" name="name" id="name" value="{{ old('name') }}">
                </div>
                <div class="form-element">
                    <div>
                        <label for="email">E-mailadres</label>
                        @error('email')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="text" name="email" id="email" value="{{ old('email') }}">
                </div>
                <div class="form-element">
                    <div>
                        <label for="username">Gebruikersnaam</label>
                        @error('username')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="text" name="username" id="username" value="{{ old('username') }}">
                </div>
                <div class="form-element">
                    <div>
                        <label for="password">Wachtwoord</label>
                        @error('password')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-element">
                    <div>
                        <label for="password_confirmation">Wachtwoord bevestiging</label>
                        @error('password_confirmation')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="password" name="password_confirmation" id="password_confirmation">
                </div>
                <div class="form-element">
                    <div>
                        <label for="role">Rol</label>
                        @error('role')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <select name="role" id="role">
                        <option value="customer">Klant</option>
                        <option value="employee">Werknemer</option>
                    </select>
                </div>

                <div>
                    <input type="submit" value="Registeer">
                </div>
            </div>
        </form>
    </section>
@endsection

