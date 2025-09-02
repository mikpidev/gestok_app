@extends('layouts.auth')

@section('title', 'Registrarse - Gestok')
@section('subtitle', 'Crea tu cuenta')

@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf

    <label for="name">Nombre</label>
    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>

    <label for="email">Correo</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}" required>

    <label for="password">Contraseña</label>
    <input id="password" type="password" name="password" required>

    <label for="password_confirmation">Confirmar Contraseña</label>
    <input id="password_confirmation" type="password" name="password_confirmation" required>

    <button type="submit" class="btn" style="width:100%;">Registrarse</button>
</form>

<div class="extra">
    ¿Ya tienes cuenta?
    <a href="{{ route('login') }}">Inicia sesión</a>
</div>
@endsection
