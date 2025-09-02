@extends('layouts.auth')

@section('title', 'Ingresar - Gestok')
@section('subtitle', 'Accede a tu cuenta')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf

    <label for="email">Correo</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

    <label for="password">Contraseña</label>
    <input id="password" type="password" name="password" required>

    <div class="actions">
        <label>
            <input type="checkbox" name="remember"> Recuérdame
        </label>
        <button type="submit" class="btn">Ingresar</button>
    </div>

    @if (Route::has('password.request'))
        <div style="margin-top: 1rem;">
            <a href="{{ route('password.request') }}" class="link">¿Olvidaste tu contraseña?</a>
        </div>
    @endif
</form>

@if (Route::has('register'))
    <div class="register">
        ¿No tienes cuenta?
        <a href="{{ route('register') }}">Crear cuenta</a>
    </div>
@endif
@endsection
