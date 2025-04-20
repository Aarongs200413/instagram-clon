@extends('layouts.login')

@section('content')
<div style="height: 100vh; width: auto;">
<div class="container d-flex justify-content-center min-vh-100">
    <div class="row w-100">
        <div class="col-md-6 d-none d-md-block text-center pe-5" >
            <div class="col-md-6 d-none d-md-block text-end pe-5" style="text-align: right; padding-left: 50px; padding-top: 50px;">
            <img src="{{ asset('assets/instagram-web-lox-image.png') }}" 
             alt="Instagram imagen" 
             style="width: auto; height: 70vh;">
        </div>
    </div>

        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
            <div class="p-4 w-100" style="max-width: 360px;">
                <div class="text-center mb-3">
                    <img src="{{ asset('assets/Instagram-Logo-2016-present.png') }}" alt="Logo Instagram"  style="max-height: 90px;">
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-2">
                        <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required >
                    </div>

                    <div class="mb-2">
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">Entrar</button>

                    <div class="text-center text-muted mb-3" style="font-size: 13px;">
                        <span style="display: inline-block; width: 40%; border-top: 1px solid #dbdbdb;"></span>
                        <span class="px-2">o</span>
                        <span style="display: inline-block; width: 40%; border-top: 1px solid #dbdbdb;"></span>
                    </div>

                    <a href="https://www.facebook.com/" class="btn btn-primary w-100 mb-3">
                        <i class="bi bi-facebook me-1"></i> Iniciar sesión con Facebook
                    </a>
                </form>
                <div class="text-center w-100" style="max-width: 360px;">
                     <a href="{{ route('password.request') }}" style="text-decoration:none; color:#00376b; font-size: 14px;">¿Has olvidado tu contraseña?</a>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger mt-2">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

            <div class="text-center w-100" style="max-width: 360px; font-size: 14px;">
                ¿No tienes una cuenta? <a href="{{ route('register') }}" style="font-size: 14px; text-decoration: none; color:#0095f6;">Regístrate</a>
            </div>
        </div>
    </div>
</div>
<footer>
    @include('layouts.footer')
</footer>
</div>
@endsection
