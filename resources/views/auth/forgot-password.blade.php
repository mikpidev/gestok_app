@extends('layouts.auth')

@section('title', 'Recuperar Contraseña - Gestok')
@section('subtitle', '¿Olvidaste tu contraseña?')

@section('content')
<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <label for="email">Correo</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

    <button type="submit" class="btn" style="width:100%;">Enviar enlace</button>
</form>

<div class="extra">
    <a href="{{ route('login') }}">Volver al login</a>
</div>
@endsection
