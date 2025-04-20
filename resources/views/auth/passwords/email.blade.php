@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Recuperar contraseña</h2>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div>
            <label>Correo electrónico</label>
            <input type="email" name="email" required>
        </div>
        <button type="submit">Enviar enlace</button>
    </form>
</div>
@endsection
