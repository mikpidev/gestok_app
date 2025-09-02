@extends('layouts.auth')

@section('title', 'Restablecer Contraseña - Gestok')
@section('subtitle', 'Crea una nueva contraseña')

@section('content')
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <label for="email">Correo</label>
    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus>

    <label for="password">Nueva Contraseña</label>
    <input id="password" type="password" name="password" required>

    <label for="password_confirmation">Confirmar Contraseña</label>
    <input id="password_confirmation" type="password" name="password_confirmation" required>

    <button type="submit" class="btn" style="width:100%;">Restablecer</button>
</form>
@endsection
