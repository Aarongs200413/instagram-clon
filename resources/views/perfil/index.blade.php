@extends('layouts.profile')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-4">
            <!-- Foto de perfil -->
            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Foto de perfil" class="img-fluid rounded-circle" style="max-width: 150px;">

            <!-- Nombre de usuario -->
            <h3>{{ $user->name }}</h3>

            <!-- Bio del usuario -->
            <p>{{ $user->bio ?? 'No hay bio disponible.' }}</p>

            <!-- Botón para iniciar chat -->
            @if(auth()->user()->id != $user->id) <!-- Para no mostrar el botón al usuario que ve su propio perfil -->
                <a href="{{ route('messages.chat', ['userId' => $user->id]) }}" class="btn btn-primary mt-3">Iniciar chat</a>
            @endif
        </div>

        <div class="col-12 col-md-8">
            <!-- Aquí puedes agregar contenido adicional como publicaciones, seguidores, etc. -->
            <h4>Publicaciones</h4>
            <!-- Mostrar publicaciones del usuario aquí -->
        </div>
    </div>
</div>
@endsection
