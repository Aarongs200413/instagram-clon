@extends('layouts.registro')

@section('content')
<div class="container d-flex justify-content-center align-items-center py-2">
    <div class="w-100" style="max-width: 400px; border: 1px solid #dbdbdb; padding: 2rem; text-align: center; background-color: #fff;">
        
        {{-- Logo --}}
        <img src="{{ asset('assets/Instagram-Logo-2016-present.png') }}" alt="Logo Instagram" style="width: 180px; ">

        <p style="font-size: 16px; color: #737373;">Regístrate para ver fotos y vídeos de tus amigos.</p>

        {{-- Botón Facebook --}}
        <a href="#" class="btn w-100 mb-3 d-flex align-items-center justify-content-center gap-2"
           style="background-color: #1877f2; color: white; font-weight: 500;">
            <i class="bi bi-facebook" style="font-size: 1rem;"></i>
            Iniciar sesión con Facebook
        </a>

        {{-- Separador --}}
        <div class="text-center text-muted mb-3" style="font-size: 13px;">
            <span style="display: inline-block; width: 40%; border-top: 1px solid #dbdbdb;"></span>
            <span class="px-2">o</span>
            <span style="display: inline-block; width: 40%; border-top: 1px solid #dbdbdb;"></span>
        </div>

        {{-- Formulario --}}
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="Nombre" class="form-control mb-2" required>
            <input type="email" name="email" placeholder="Correo" class="form-control mb-2" required>
            <input type="password" name="password" placeholder="Contraseña" class="form-control mb-2" required>
            <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" class="form-control mb-3" required>

            <p style="font-size: 12px; color: #737373;" class="mb-2">
                Es posible que los usuarios de nuestro servicio hayan subido tu información de contacto en Instagram.
                <a href="#" class="text-primary text-decoration-none">Más información</a>
            </p>
            <p style="font-size: 12px; color: #737373;" class="mb-3">
                Al registrarte, aceptas nuestras <a href="#" class="text-primary text-decoration-none">Condiciones</a>,
                nuestra <a href="#" class="text-primary text-decoration-none">Política de privacidad</a> y nuestra
                <a href="#" class="text-primary text-decoration-none">Política de cookies</a>.
            </p>
            <button type="submit" class="btn btn-primary w-100">Registrarte</button>
        </form>
    </div>
</div>

{{-- Iniciar sesión --}}
<div class="container d-flex justify-content-center align-items-center ">
    <div class="w-100" style="max-width: 400px; border: 1px solid #dbdbdb; padding: 1rem; text-align: center; background-color: #fff;">
        <p style="font-size:14px;">¿Tienes cuenta?
        <a href={{ route('login') }} style="text-decoration: none; color:#0095f6;font-size:14px;">Entrar</a>
        </p>
    </div>
</div>

{{-- Descargas --}}
<div class="container d-flex justify-content-center align-items-center p-1">
    <div class="w-100" style="max-width: 400px; padding: 1rem; text-align: center; background-color: #fff;">
        <span style="font-size:14px;">Descarga la aplicación.</span>
        <div class="d-flex" style="height: auto;">
            <div class="w-50 d-flex justify-content-center align-items-center">
                <img src="{{ asset('assets/img1.png') }}" alt="Imagen" style="max-width: 100%; height: 70%;">
            </div>
        
            <div class="w-50 d-flex justify-content-center align-items-center">
                <div class="text-center">
                    <img src="{{ asset('assets/img2.png') }}" alt="Imagen" style="max-width: 60%; height: auto;">
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Footer --}}
<footer>
    @include('layouts.footer')
</footer>
@endsection
