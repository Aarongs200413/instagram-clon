@extends('layouts.profile')

@section('content')
<div class="container">
    <h4 class="mb-4">Mensajes</h4>
    <div class="list-group">
        @forelse($conversations as $user)
            <a href="{{ route('messages.chat', $user->id) }}" class="list-group-item list-group-item-action d-flex align-items-center mb-3 rounded shadow-sm">
                <!-- Avatar del usuario -->
                <img src="{{ $user->profile_picture ? asset('storage/'.$user->profile_picture) : 'https://i.pravatar.cc/40' }}" 
                     alt="Avatar" class="rounded-circle" style="width: 45px; height: 45px; margin-right: 15px;">

                <div class="d-flex justify-content-between w-100">
                    <div>
                        <strong>{{ $user->name }}</strong>
                        <p class="text-muted mb-0" style="font-size: 0.9em;">Último mensaje...</p>
                    </div>
                    <div class="text-muted">
                        <small>{{ $user->last_message_time }}</small> <!-- Aquí puedes usar el tiempo de la última conversación -->
                    </div>
                </div>
            </a>
        @empty
            <p>No tienes conversaciones disponibles.</p>
        @endforelse
    </div>
</div>

@endsection
